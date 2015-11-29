<?php
class TrackingConfig extends DataExtension
{
    private static $db = array(
        'GoogleTagManager' => 'Varchar(20)',
        'GoogleAnaltyicsID' => 'Varchar(20)',
        'CrazyEgg' => 'Text'
    );

    public function updateCMSFields(FieldList $fields)
	{
        $fields->addFieldsToTab('Root.Tracking.Google', array(
            TextField::create(
                'GoogleTagManager',
                'Tag manager ID'
            )->setAttribute("placeholder", "GTM-******"),
            TextField::create(
                'GoogleAnaltyicsID',
                'Analytics ID'
            )->setAttribute("placeholder", "UA-******-*")
        ));
        $fields->addFieldsToTab('Root.Tracking.Other', array(
            TextareaField::create(
                'CrazyEgg',
                'CrazyEgg Code'
            )
        ));
        return $fields;
    }
}
