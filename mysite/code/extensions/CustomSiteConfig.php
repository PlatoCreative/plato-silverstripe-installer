<?php
class CustomSiteConfig extends DataExtension
{
    private static $db = array(
        'GoogleTagManager' => 'Text',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar(255)',
        'FreePhone' => 'Varchar(255)',
        'Mobile' => 'Varchar(255)',
        'Fax' => 'Varchar(255)',
        'PostalAddress' => 'Text',
        'PhysicalAddress' => 'Text',
        'FacebookURL' => 'Varchar(255)',
        'TwitterURL' => 'Varchar(255)',
        'PinterestURL' => 'Varchar(255)',
        'LinkedInURL' => 'Varchar(255)',
        'InstagramURL' => 'Varchar(255)',
        'YoutubeURL' => 'Varchar(255)'
    );

    private static $has_one = array();

    private static $has_many = array();

    public function updateCMSFields(FieldList $fields)
	{
        $fields->removeByName('Theme');

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Email', 'Email Address')->setAttribute("placeholder", "email@domain.com"),
            TextField::create('Phone', 'Phone Number'),
            TextField::create('FreePhone', 'Free Phone Number'),
            TextField::create('Mobile', 'Mobile Number'),
            TextField::create('Fax', 'Fax Number'),
            TextField::create('FacebookURL', 'Facebook URL')->setAttribute("placeholder", "http://www.facebook.com"),
            TextField::create('TwitterURL', 'Twitter URL')->setAttribute("placeholder", "http://www.twitter.com"),
            TextField::create('PinterestURL', 'Pinterest URL')->setAttribute("placeholder", "http://www.pinterest.com"),
            TextField::create('InstagramURL', 'Instagram URL')->setAttribute("placeholder", "http://www.instagram.com"),
            TextField::create('LinkedInURL', 'LinkedIn URL')->setAttribute("placeholder", "http://www.linkedin.com"),
            TextField::create('YoutubeURL', 'Youtube URL')->setAttribute("placeholder", "http://www.youtube.com"),
            TextareaField::create('PostalAddress', 'Postal Address')->setRows(4),
            TextareaField::create('PhysicalAddress', 'Physical Address')->setRows(4)
        ));

        $fields->addFieldsToTab('Root.Plato', array(
            TextField::create('GoogleTagManager', 'Enter the Tag Manager ID')
        ));

        return $fields;
    }
}
