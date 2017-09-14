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
        Requirements::block(THIRDPARTY_DIR.'/jquery/jquery.js');
        Requirements::set_force_js_to_bottom(true);
    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
