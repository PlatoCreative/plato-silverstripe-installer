<?php

/**
 * Adds an apearance tab to site config
 *
 * @package silverstripe
 * @subpackage mysite
 */
class TrackingConfig extends DataExtension
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'GoogleTagManager' => 'Varchar(20)',
        'GoogleAnaltyicsID' => 'Varchar(20)',
        'CrazyEgg' => 'Text'
    );

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab(
            'Root.Tracking',
            array(
                TextField::create(
                    'GoogleTagManager',
                    'Tag manager ID'
                )->setAttribute("placeholder", "GTM-******"),
                TextareaField::create(
                    'CrazyEgg',
                    'CrazyEgg Code'
                ),
                TextField::create(
                    'GoogleAnaltyicsID',
                    'Analytics ID'
                )->setAttribute("placeholder", "UA-******-*")
            )
        );
        return $fields;
    }

    function onBeforeWrite() {
        parent::onBeforeWrite();
        // strip the rest of the code and get the id.  This stop accidental html structural breaks
        preg_match("/scripts\/(\d{4}\/\d{4})\.js/i", $this->owner->CrazyEgg, $match);
        if(isset($match[0])){
            $CrazyEggID = istr_replace('scripts/','',$match[0]);
            $CrazyEggID = istr_replace('.js','',$CrazyEggID);
            $this->owner->CrazyEgg = $CrazyEggID;
        }
    }
}
