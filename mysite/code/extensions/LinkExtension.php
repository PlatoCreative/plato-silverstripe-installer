<?php

/**
 * Adds additional functionality to the link model from sheadawson/silverstripe-linkable
 *
 * @package silverstripe
 * @subpackage mysite
 */
class LinkExtension extends DataExtension
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'FAIcon' => 'varchar',
        'TrackingID' => 'varchar'
    );

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create(
                'TrackingID',
                'Tracking ID'
            )
        );

        if (class_exists('FontAwesomeIconPickerField')) {
            $fields->addFieldToTab(
                'Root.Main',
                FontAwesomeIconPickerField::create(
                    'FAIcon',
                    'Icon'
                )
            );
        }
        return $fields;
    }

    public function getIcon()
    {
        if (!class_exists('FontAwesomeIconPickerField')) {
            return false;
        }
        $icon = $this->owner->FAIcon ? Convert::raw2att( $this->owner->FAIcon ) : '';
        return $icon ? "<i class='fa fa-fw $icon'></i>" : '';
    }

    public function getTrackingAttr()
    {
        $attr = '';
        $siteConfig = SiteConfig::current_site_config();

        if($this->owner->TrackingID){
            if(isset($siteConfig->GoogleTagManager)){
                $id = Convert::raw2att(str_replace(' ','_',$this->owner->TrackingID));
                $attr .= " id='$id' ";
            }
            if(isset($siteConfig->GoogleAnaltyicsID)){
                $track = Convert::raw2att($this->owner->TrackingID);
                $attr .= " data-ga-label='$track' ";
            }
        }
        return $attr;
    }
}
