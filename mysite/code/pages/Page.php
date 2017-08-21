<?php
class Page extends SiteTree
{
    private static $db = array();

    private static $has_one = array();

    private static $has_many = array();

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}

class Page_Controller extends ContentController
{
    public function init()
    {
        parent::init();
        Requirements::themedCSS('app');
        Requirements::themedJavascript('app.min');
        Requirements::themedJavascript('manifest');
        Requirements::themedJavascript('vendor');
        Requirements::block(THIRDPARTY_DIR.'/jquery/jquery.js');
        Requirements::block('framework/javascript/i18n.js');
        Requirements::block('userforms/thirdparty/jquery-validate/jquery.validate.min.js');
        Requirements::block('userforms/javascript/lang/en.js');
        Requirements::block('userforms/javascript/lang/en_US.js');
        Requirements::block('userforms/javascript/UserForm.js');
        Requirements::block('userforms/thirdparty/jquery.are-you-sure/jquery.are-you-sure.js');
        Requirements::set_force_js_to_bottom(true);
    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
