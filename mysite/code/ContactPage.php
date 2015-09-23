<?php
class ContactPage extends UserDefinedForm
{

    private static $icon = 'mysite/images/contact.png';

    private static $db = array(
        'ExtraContent' => 'HTMLText',
        'GoogleMap' => 'Text'
    );

    private static $has_one = array();

    function getCMSFields(){
        $fields = parent::getCMSFields();
        
        // Main Tab
        $fields->addFieldsToTab('Root.Main', array(
            HTMLEditorField::create('ExtraContent', 'Extra Content')
        ), 'Metadata');
        
        // Google Map
		$fields->addFieldsToTab('Root.GoogleMap', array(
			TextField::create('GoogleMap', 'Google Map URL')
		));
        
        return $fields;
    }
    
    // Google Map
	public function LatLong(){
		$ll = preg_match('/\@([-.0-9]+),([-.0-9]+)/', $this->GoogleMap, $matches);
		return $ll ? ArrayData::create(array('Latitude' => $matches[1], 'Longitude' => $matches[2], 'Nice' => $matches[1] . ',' . $matches[2])) : null;
	}
}

class ContactPage_Controller extends UserDefinedForm_Controller {
    private static $allowed_actions = array ();

    public function init() {
        parent::init();
    }
}
