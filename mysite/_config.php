<?php
// Get YML comfiguration settings
$config = Config::inst();

// use database name from config.yml unless defined in environment
if( ! defined('SS_DATABASE_NAME')){
  define('SS_DATABASE_NAME', $config->get('Database', 'name'));
}

// include configuration set in _ss_environment.php
require_once('conf/ConfigureFromEnv.php');

FulltextSearchable::enable(array('SiteTree'));

if (Director::isDev()) {
  // Turn on all errors
  ini_set('display_errors', 1);
  ini_set("log_errors", 1);
  // error_reporting(E_ERROR | E_PARSE);
  // error_reporting(E_ALL && ~E_DEPRECATED);
  error_reporting(E_ALL | E_STRICT);

  SS_Log::add_writer(new SS_LogFileWriter(dirname(__FILE__).'/errors.log'));

  // Use Mailgun to send all emails while in DEV mode
  // When in LIVE/TEST mode all emails will be sent via the default Mail class.
  Email::set_mailer( new SmtpMailer() );

  // SSViewer::flush_template_cache();
  // Email::send_all_emails_to('?@platocreative.co.nz');
}

if (Director::isTest()) {

    // BasicAuth::protect_entire_site();

    ini_set('display_errors', 1);
    ini_set("log_errors", 1);
    error_reporting(E_ALL | E_STRICT);

    SS_Log::add_writer(new SS_LogFileWriter(dirname(__FILE__).'/errors.log'));

    // Email::set_mailer( new SmtpMailer() );
    //Email::send_all_emails_to('?@platocreative.co.nz');

}

// Remove extra buttons from editor
HtmlEditorConfig::get('cms')->removeButtons('selectall', 'visualaid', 'strikethrough', 'pasteword', 'cut', 'copy', 'paste');
