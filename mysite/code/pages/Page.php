<?php
/**
 * Page
 *
 * @package silverstripe
 * @subpackage mysite
 */
class Page extends SiteTree
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array();

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array();

    /**
     * Has_many relationship
     * @var array
     */
    private static $has_many = array();

    /**
     * CMS Fields
     * @return FieldList
     */
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

        //Set a custom combined folder under themes so relative paths to images within CSS files don't break
        Requirements::set_combined_files_folder($this->ThemeDir() . '/combined');
        Requirements::set_force_js_to_bottom(true);

        $requiredJS = array(
            'thirdparty/jquery/dist/jquery.min.js',
            'thirdparty/foundation-sites/dist/foundation.min.js',
            'thirdparty/jquery-cycle2/build/jquery.cycle2.min.js',
            'thirdparty/jquery-cycle2/build/plugin/jquery.cycle2.swipe.min.js',
            'thirdparty/fancybox/source/jquery.fancybox.pack.js',
            'thirdparty/fancybox/source/helpers/jquery.fancybox-media.js'
        );

        $requiredJS[] = $this->ThemeDir().'/js/app.js';

        // [1] use this is this is a custom build
        Requirements::combine_files(
            'app.js',
            $requiredJS
        );

        Requirements::css("thirdparty/fancybox/source/jquery.fancybox.css");
        Requirements::css("thirdparty/fancybox/source/helpers/jquery.fancybox-buttons");

    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
