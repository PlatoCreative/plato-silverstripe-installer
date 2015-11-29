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
