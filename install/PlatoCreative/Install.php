<?php
namespace PlatoCreative;

use Composer\Script\Event;
use Spyc;

/**
* Plato Creative SilverStripe installer.
* A few utility functions to setup the site directory for rapid development.
*/
class Install
{

  /**
  * The file that contains environment information
  */
  const ENVIRONMENT_FILE = '_ss_environment.php';

  /**
  * @var string
  */
  private static $basePath = '';

  /**
  * Get the document root for this project. Attempts getcwd(), falls back to
  * directory traversal.
  * @return string
  */
  public static function getBasepath()
  {
    if (! self::$basePath) {
      $candidate = getcwd() ?: dirname(dirname(dirname(dirname(__FILE__))));
      self::$basePath = rtrim($candidate, DIRECTORY_SEPARATOR);
    }

    return self::$basePath;
  }

  /**
  * Returns a text description of the current environment type. Assumes
  * 'live' if it can't determine an environment type.
  * @return string
  */
  protected static function getEnvironmentType()
  {
    if ($file = self::getEnvironmentFile()) {
      include_once $file;

      if (defined('SS_ENVIRONMENT_TYPE')) {
        return SS_ENVIRONMENT_TYPE;
      }
    }

    return 'live';
  }

  /**
  * Try to find a file that contains information about the environment. Scans
  * the current working directory and all parents looking for the file.
  * @return string|boolean
  */
  protected static function getEnvironmentFile()
  {
    $envFile = self::ENVIRONMENT_FILE;
    $directory = realpath('.');

    // Traverse directories "upwards" until we hit an unreadable directory
    // or the root of the drive
    do {
      // Add the trailing slash we need to concatenate properly
      $directory .= DIRECTORY_SEPARATOR;

      // If it's readable, go ahead
      if (is_readable($directory)) {
        // If the file exists, return its path
        if (file_exists($directory.$envFile)) {
          return $directory.$envFile;
        }
      } else {
        // If we can't read the directory, give up
        break;
      }

      // Go up a level
      $directory = dirname($directory);

      // If these are the same, we've hit the root of the drive
    } while (dirname($directory) != $directory);

    return false;
  }

  /**
  * Rename the 'default' theme directory, amend package name, description and
  * update a few SilverStripe configuration files.
  * @param  array $config
  * @return void
  */
  protected static function applyConfiguration(array $config, $themeName)
  {
    $base = self::getBasepath();
    include $base.'/framework/thirdparty/spyc/spyc.php';

    // Rename theme directory
    $themeBase = $base.'/themes/';
    rename($themeBase.$themeName.'/', $themeBase.$config['theme'].'/');

    // Update config.yml with user input
    $configPath = $base.'/mysite/_config/config.yml';
    if (file_exists($configPath)) {
      self::updateYamlConfig($configPath, $config);
    }
  }

  /**
  * Update config.yml with relevant information in provided config.
  * @param  string $filePath
  * @param  array  $config
  * @return void
  */
  protected static function updateYamlConfig($filePath, array $config)
  {
    $yamlConfig = Spyc::YAMLLoad(file_get_contents($filePath));

    // Update YAML config
    $yamlConfig['SSViewer']['theme'] = $config['theme'];

    if (isset($config['sql-host']) || isset($config['sql-name'])) {
      //$yamlConfig['Database']['host'] = $config['sql-host'];
      $yamlConfig['Database']['name'] = $config['sql-name'];
    }

    // Write our updated config file
    $yaml = Spyc::YAMLDump($yamlConfig);
    file_put_contents($filePath, $yaml);
  }

  /**
  * Runs "foundation new ff" in the new theme folder, if it exists.
  * @return void
  */
  protected static function installFoundation($theme)
  {
    $basePath = self::getBasepath();
    // check if theme exists
    if (file_exists($basePath . '/themes/' . $theme)) {
      $current = __DIR__;
      chdir($basePath . '/themes/' . $theme);
      echo shell_exec('foundation new ff');
      chdir($current);
    }
  }

  /**
  * Grunty, dirty clean function to move, rename and delete files from foundation's install
  * @return void
  */
  protected static function cleanUpFoundation($theme)
  {
    $basePath = self::getBasepath();
    if (file_exists($basePath . '/themes/' . $theme)) {

      $themeDir = $basePath . '/themes/' . $theme;

      // organise the themes directory
      self::recurse_copy($themeDir . "/ff", $themeDir);
      self::recurse_copy($themeDir . "/bower_components", $themeDir . "/js");
      self::recurse_copy($themeDir . "/js/foundation", $themeDir . "/foundation"); // foundation does not need to goes into the js folder :/

      // files have been moved so lets delete some stuff that we no longer need
      self::rmdir_recursive($themeDir . "/js/foundation"); // no longer required
      self::rmdir_recursive($themeDir . "/ff"); // no longer required
      self::rmdir_recursive($themeDir . "/bower_components"); // no longer required
      self::rmdir_recursive($themeDir . "/.git"); // no git thanks!
      unlink($themeDir . "/.gitignore");
      unlink($themeDir . "/bower.json");
      unlink($themeDir . "/.bowerrc");
      unlink($themeDir . "/humans.txt");
      unlink($themeDir . "/README.md");
      unlink($themeDir . "/robots.txt");

      // update the compass config so it's good to go!
      $compassConfigFile = $themeDir . "/config.rb";

      $compassConfigFileHandle = fopen($compassConfigFile, "r");
      $compassConfigContent = fread($compassConfigFileHandle, filesize($compassConfigFile));
      $compassConfigContent = str_replace("bower_components/", "", $compassConfigContent);
      $compassConfigFileHandle = fopen($compassConfigFile,"w");
      fwrite($compassConfigFileHandle,$compassConfigContent);
      fclose($compassConfigFileHandle);
      // same again :/
      $compassConfigFileHandle = fopen($compassConfigFile, "r");
      $compassConfigContent = fread($compassConfigFileHandle, filesize($compassConfigFile));
      $compassConfigContent = str_replace("stylesheets", "css", $compassConfigContent);
      $compassConfigFileHandle = fopen($compassConfigFile,"w");
      fwrite($compassConfigFileHandle,$compassConfigContent);
      fclose($compassConfigFileHandle);

      // now we need to create some files to save even more time ;)
      fopen($themeDir . "/scss/_layout.scss", "w");
      fopen($themeDir . "/scss/editor.scss", "w");
      fopen($themeDir . "/scss/typography.scss", "w");
    }
  }

  /**
  * Run bundle if a Gemfile exists and then compile the Sass.
  * @return void
  **/
  protected static function compileSass($theme)
  {
    $basePath = self::getBasepath();
    $current = __DIR__;
    chdir($basePath . '/themes/' . $theme);
    // run bundle once it there is a Gemfile present
    if (file_exists($basePath . '/themes/' . $theme . '/Gemfile')) {
      // bundle up foundations gems
      shell_exec('bundle');
      echo shell_exec('compass compile');
    }else{
      // no Gemfile is found so run compass compile normally
      echo shell_exec('compass compile');
    }
    chdir($current);
  }

  /**
  * Recursive function to copy folders/files
  * @return void
  **/
  public static function recurse_copy($src,$dst)
  {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
      if (( $file != '.' ) && ( $file != '..' )) {
        if ( is_dir($src . '/' . $file) ) {
          self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
        }
        else {
          copy($src . '/' . $file,$dst . '/' . $file);
        }
      }
    }
    closedir($dir);
  }

  /**
  * Recursive function to delete folders/files
  * @return void
  **/
  public static function rmdir_recursive($dir)
  {
    foreach(scandir($dir) as $file) {
      if ('.' === $file || '..' === $file) continue;
      if (is_dir("$dir/$file")){
        self::rmdir_recursive("$dir/$file");
      }else{
        chmod("$dir/$file", 0777);
        unlink("$dir/$file");
      }
    }
    rmdir($dir);
  }


  /********************** EVENTS **********************/

  /**
  * Called after every "composer install" command.
  * @param  Composer\Script\Event $event
  * @return void
  */
  public static function postInstall(Event $event)
  {
    $io = $event->getIO();
    $basePath = self::getBasepath();

    // theme name based on type e.g. BASE OR DEFAULT
    $themeTypeName = "default";

    if ($buildType = $io->ask('Is this a custom/bespoke build? Y or N: ')) {
        $answerPool = array("y", "yes", "Yes", "yup", "yea", "Y");
        if(in_array($buildType, $answerPool)){
            // no need to rename theme type as it defaults to...default.
        } else {
            $themeTypeName = "base";
        }
    }

    // Check environment type
    if (self::getEnvironmentType() !== 'dev') {
      $io->write('LIVE Environment detected, installer will not complete.');
      $io->write('Ensure a _ss_environment.php file exists and is set to DEV.');
      exit;
    }

    $basePath = self::getBasepath();

    // If the theme has already been renamed, assume this setup is complete
    if (file_exists("$basePath/themes/$themeTypeName")) {

      // Only try to rename things if the user actually provides some info
      if ($theme = $io->ask('Please specify the theme name: ')) {
        $config = array(
          'theme' => $theme,
          // 'sql-host' => $io->ask('Please specify the database host: '),
          'sql-name' => $io->ask('Please specify the database name: '),
        );
        // apply configuration based on above and theme type
        self::applyConfiguration($config, $themeTypeName);

        $io->write('New configuration settings have been applied.');
        if(in_array($buildType, $answerPool)){
            $io->write('Foundation will now be installed...');

            // install foundation if not base build
            self::installFoundation($config['theme']);
        }

        // settings have been updated so it's time to tidy up what was downloaded from Foundation.
        if(in_array($buildType, $answerPool)){
            self::cleanUpFoundation($config['theme']);
            $io->write('Foundation has been installed and the contents have been organised.');
            $io->write('Bundle will now be run and then compass will compile the stylesheets...');
        }

        // run bundle and compass compile
        self::compileSass($config['theme']);

        $io->write('Installation complete. Any extra modules will now be required.');

        // base on the answer above regarding build type remove and add a few things
        if($themeTypeName == "default"){
            // remove BASE theme as no longer required
            if (file_exists($basePath.'/themes/base')) {
                 self::rmdir_recursive($basePath.'/themes/base');
            }
        } else {
            // add required BASE modules
            // remove DEFAULT theme as this is no longer required
            if (file_exists("$basePath/themes/default")) {
                self::rmdir_recursive("$basePath/themes/default");
            }
            // this will prevent anything from being fired afterwards
            echo shell_exec('cd ../../ && composer require plato-creative/plato-silverstripe-homeslides:dev-master plato-creative/plato-silverstripe-hometiles:dev-master plato-creative/plato-silverstripe-banners:1.0 plato-creative/plato-silverstripe-gallery:1.0');
        }

      }

    }

  }

  /**
  * Called after every "composer update" command.
  * @param  Composer\Script\Event $event
  * @return void
  */
  public static function postUpdate(Event $event)
  {
    $io = $event->getIO();
    $io->write("postUpdate event triggered.");
  }

}
