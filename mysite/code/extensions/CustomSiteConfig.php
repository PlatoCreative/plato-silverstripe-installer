<?php

class CustomSiteConfig extends DataExtension {

	private static $db = array(
		'GoogleTagManager' => 'Text'
	);

	private static $has_one = array(
	);

	private static $has_many = array(
	);

	public function updateCMSFields(FieldList $fields) {
		
		// $fields->removeByName('Theme');
		
		$fields->addFieldsToTab('Root.GoogleTagManager', array(
			TextField::create('GoogleTagManager', 'Enter the Tag Manager ID')	
		));
						
		return $fields;
	}

}
