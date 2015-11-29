<?php
class CustomSiteConfig extends DataExtension
{
    private static $db = array(
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
        // $fields->removeByName('Theme');

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create(
                'FacebookURL',
                'Facebook URL'
            )->setAttribute("placeholder", "http://www.facebook.com"),
            TextField::create(
                'TwitterURL',
                'Twitter URL'
            )->setAttribute("placeholder", "http://www.twitter.com"),
            TextField::create(
                'PinterestURL',
                'Pinterest URL'
            )->setAttribute("placeholder", "http://www.pinterest.com"),
            TextField::create(
                'InstagramURL', 'Instagram URL')->setAttribute("placeholder", "http://www.instagram.com"),
            TextField::create(
                'LinkedInURL',
                'LinkedIn URL'
            )->setAttribute("placeholder", "http://www.linkedin.com"),
            TextField::create(
                'YoutubeURL',
                'Youtube URL'
            )->setAttribute("placeholder", "http://www.youtube.com"),
        ));

        return $fields;
    }
}
