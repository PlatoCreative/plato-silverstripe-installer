<?php

class CustomSiteConfig extends DataExtension {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $has_many = array(
	);

	public function updateCMSFields(FieldList $fields) {
		
		// $fields->removeByName('Theme');
						
		return $fields;
	}

	public function LatestBlogPosts($limit=1) {
		return class_exists('BlogEntry') ? BlogEntry::get()->sort('Date DESC')->limit($limit) : null;
	}

}
