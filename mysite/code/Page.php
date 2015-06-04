<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $has_many = array(
	);
		
	function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}
	
}
class Page_Controller extends ContentController {
		
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		//Set a custom combined folder under themes so relative paths to images within CSS files don't break
		Requirements::set_combined_files_folder($this->ThemeDir() . '/combined');
		
		// Javascript
		Requirements::block(THIRDPARTY_DIR . '/jquery/jquery.js');
		Requirements::combine_files(
			'app.js',
			array(
				$this->ThemeDir() . '/js/jquery/dist/jquery.min.js',
				$this->ThemeDir() . '/foundation/js/foundation.min.js',
				$this->ThemeDir() . '/js/app.js'
			)
		);
		
		Requirements::set_force_js_to_bottom(true);
		// Requirements::customScript();

	}
	
}
