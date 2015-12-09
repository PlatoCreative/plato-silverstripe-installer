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

    /********************** EVENTS **********************/

    /**
    * Called after every "composer install or create-project" command.
    * @param  Composer\Script\Event $event
    * @return void
    */
    public static function postInstall(Event $event)
    {
        $io = $event->getIO();
        $basePath = (string) self::getBasepath();
        $baseName = end((explode('/',$basePath)));
        $baseName = explode('.',$baseName)[0];
        include $basePath.'/framework/thirdparty/spyc/spyc.php';
        $configPath = $basePath.'/mysite/_config/config.yml';

        if (file_exists($configPath)) {
            $config = Spyc::YAMLLoad(file_get_contents($configPath));
        }else{
            $io->write("Could not find $configPath.");
            exit;
        }

        // If BuildType exists don't run this script
        if(isset($config['BuildType'])){
            exit;
        }

        $config['BuildType'] = 'bespoke';
        if ($buildType = $io->ask('Is this a bespoke build? Y or N: ')) {
            if(substr(strtolower($buildType), 0, 1 ) !== "y"){
                // this will prevent anything from being fired afterwards
                $config['BuildType'] = 'base'; // just for historical purposes we record the build type
                echo shell_exec('cd ../../ && composer require plato-creative/plato-silverstripe-homeslides:dev-master plato-creative/plato-silverstripe-hometiles:dev-master plato-creative/plato-silverstripe-banners:dev-master plato-creative/plato-silverstripe-gallery:dev-master');
            }
        }

        $themesDir = "$basePath/themes/";
        $baseTheme = "$themesDir/base";
        // If the theme has already been renamed, assume this setup is complete
        if (file_exists($baseTheme)) {
            // Only try to rename things if the user actually provides some info
            if ($ThemeName = $io->ask("Please specify the theme name [$baseName]: ")) {
                $config['SSViewer']['theme'] = $ThemeName;
            }else{
                $config['SSViewer']['theme'] = $baseName;
            }
            rename($baseTheme, $themesDir.$config['SSViewer']['theme']);
        }

        $DefaultDatebaseName = 'ss_'.$baseName;
        if ($DatebaseName = $io->ask("Please specify the database name [$DefaultDatebaseName]: ")) {
            $config['Database']['name'] = $DatebaseName;
        }else{
            $config['Database']['name'] = $DefaultDatebaseName;
        }

        // apply configuration to yaml
        $yaml = Spyc::YAMLDump($config);
        if(!file_put_contents($configPath, $yaml)){
            $io->write('Failed to write config file.  Check your folder/file permissions.');
            exit;
        }

        // echo shell_exec('cd ../../ && php framework/cli-script.php dev/build');
        $io->write('Plato configuration is complete.');
    }

    /**
    * Called after every "composer update" command.
    * @param  Composer\Script\Event $event
    * @return void
    */
    public static function postUpdate(Event $event)
    {
        $io = $event->getIO();
        // echo shell_exec('cd ../../ && php framework/cli-script.php dev/build');
        $io->write("postUpdate event triggered.");
    }
}
