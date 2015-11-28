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
                'thirdparty/jquery/dist/jquery.min.js',
                'thirdparty/foundation-sites/dist/foundation.min.js',
                'thirdparty/jquery-cycle2/build/jquery.cycle2.min.js',
                'thirdparty/jquery-cycle2/build/plugin/jquery.cycle2.swipe.min.js',
                $this->ThemeDir().'/js/app.js'
            )
        );

        if(class_exists('GalleryItem')) {
            Requirements::combine_files(
                'fancybox.js',
                array(
                    '/thirdparty/fancybox/source/jquery.fancybox.pack.js',
                    '/thirdparty/fancybox/source/helpers/jquery.fancybox-media.js'
                )
            );
        }

        // Requirements::customScript();
    }

    public function IsLive()
    {
        return Director::isLive();
    }
}
