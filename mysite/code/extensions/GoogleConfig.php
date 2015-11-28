<?php
class GoogleConfig extends DataExtension
{
    private static $db = array(
        'GoogleTagManager' => 'Varchar(20)',
        'GoogleAnaltyicsID' => 'Varchar(20)'
    );

    public function updateCMSFields(FieldList $fields)
	{
        $fields->addFieldsToTab('Root.Tracking', array(
            TextField::create(
                'GoogleTagManager',
                'Enter the tag manager ID'
            )->setAttribute("placeholder", "GTM-******"),
            TextField::create(
                'GoogleAnaltyicsID',
                'Enter the analytics ID'
            )->setAttribute("placeholder", "UA-******-*"),
        ));

        return $fields;
    }
}
