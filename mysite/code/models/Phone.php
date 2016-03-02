<?php
class Phone extends Dataobject
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'Type' => 'Enum(array("Phone","Mobile","Free Phone","Fax"),"Phone")',
        'ContactNumber' => 'Varchar(20)',
        'Label' => 'Varchar(20)',
        'TrackingID' => 'Varchar'
    );

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array(
        'SiteConfig' => 'SiteConfig',
        'SiteTree' => 'SiteTree'
    );

    private static $summary_fields = array(
        'Type',
        'ContactNumber',
        'Label',
        'TrackingID'
    );

    /**
     * Default sort ordering
     * @var string
     */
    private static $default_sort = 'ID ASC';

    /**
     * CMS Fields
     * @return FieldList
     */
    function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            array(
                DropdownField::create(
                    'Type',
                    'Type',
                    singleton('Phone')
                        ->dbObject('Type')
                        ->enumValues()
                ),
                TextField::create(
                    'ContactNumber',
                    'Number'
                ),
                TextField::create(
                    'Label',
                    'Label'
                )
            )
        );
        return $fields;
    }

    function getTitle()
    {
        if (!$this->Label){
            return $this->Type.": ".$this->Number;
        }
        return $this->Label;
    }

    function getIcon()
    {
        switch ($this->Type) {
            case 'Mobile':
                return 'mobile';
                break;
            case 'Fax':
                return 'fax';
                break;
            case 'Phone':
            case 'Free Phone':
            default:
                return 'phone';
                break;
        }
    }

    public function getTrackingAttr()
    {
        $attr = '';
        $siteConfig = SiteConfig::current_site_config();
        $TrackingID = ($this->TrackingID ? $this->TrackingID : $this->Type.' '.$this->ContactNumber);

        if($TrackingID){
            if(isset($siteConfig->GoogleTagManager)){
                $id = Convert::raw2att(str_replace(' ','_',$TrackingID));
                $attr .= " id='$id' ";
            }
            if(isset($siteConfig->GoogleAnaltyicsID)){
                $track = Convert::raw2att($TrackingID);
                $attr .= " data-ga-label='$track' ";
            }
        }
        return $attr;
    }
}
