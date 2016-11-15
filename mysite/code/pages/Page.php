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
    private static $allowed_actions = array ();

    public function init() {
        parent::init();

        Requirements::set_force_js_to_bottom(true);
        Requirements::javascript($this->ThemeDir().'/js/app.min.js');

        // Requirements::customScript();
    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
