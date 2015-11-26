<?php
class Page extends SiteTree
{
    private static $db = array();

    private static $has_one = array();

    private static $has_many = array();

    function getCMSFields()
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

        // [1] use this is this is a custom build
        Requirements::combine_files(
            'app.js',
            array(
                'vendor/jquery/dist/jquery.min.js',
                'vendor/foundation-sites/js/foundation.min.js',
                'vendor/js/app.js'
            )
        );

        if(class_exists('HomeSlide') || class_exists('GalleryItem')) {
            Requirements::javascript('vendor/cycle2/jquery.cycle2.min.js');
            Requirements::javascript('vendor/cycle2/jquery.cycle2.swipe.min.js');
            Requirements::javascript('vendor/fancybox/source/jquery.fancybox.pack.js');
            Requirements::javascript('vendor/fancybox/source/helpers/jquery.fancybox-media.js');
        }

        // Requirements::customScript();
    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
