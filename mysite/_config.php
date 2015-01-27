<?php
// Get YML comfiguration settings
$config = Config::inst();

// check url path to determine if local/dev or live
if( ! preg_match('/(\.localhost|\.local|\.dev|\.dev\.platocreative\.co\.nz)$/', $_SERVER['HTTP_HOST'])) {
  define('SS_DATABASE_SERVER', 'localhost');
} elseif( ! defined('SS_DATABASE_SERVER')) {
  define('SS_DATABASE_SERVER', $config->get('Database', 'host'));
}

// use database name from config.yml unless defined in environment
if( ! defined('SS_DATABASE_NAME')){
  define('SS_DATABASE_NAME', $config->get('Database', 'name'));
}

// include configuration set in _ss_environment.php
require_once('conf/ConfigureFromEnv.php');

// Spellcheck options (remove comments to enable)
// HtmlEditorConfig::get('cms')->enablePlugins('spellchecker', 'contextmenu');
// HtmlEditorConfig::get('cms')->addButtonsToLine(2, 'spellchecker');

if (Director::isDev()) {
  // Turn on all errors
  ini_set('display_errors', 1);
  ini_set("log_errors", 1);
  // error_reporting(E_ERROR | E_PARSE);
  // error_reporting(E_ALL && ~E_DEPRECATED);
  error_reporting(E_ALL | E_STRICT);

  SS_Log::add_writer(new SS_LogFileWriter(dirname(__FILE__).'/errors.log'));
  // SSViewer::flush_template_cache();
  // Email::send_all_emails_to('?@platocreative.co.nz');
}
