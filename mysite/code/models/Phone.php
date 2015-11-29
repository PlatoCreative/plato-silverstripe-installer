<?php
class Phone extends Dataobject
{
    private static $db = array(
        'Type' => 'Enum(array("Phone","Mobile","Free Phone","Fax"),"Phone")',
        'Number' => 'Varchar(20)',
        'Label' => 'Varchar(20)'
    );

    private static $has_one = array(
        'SiteConfig' => 'SiteConfig',
        'SiteTree' => 'SiteTree'
    );

    private static $summary_fields = array(
        'Type',
        'Number',
        'Label'
    );

    private static $default_sort = 'ID ASC';

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
                    'Number',
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
                return 'fa-mobile';
                break;
            case 'Fax':
                return 'fa-fax';
                break;
            case 'Phone':
            case 'Free Phone':
            default:
                return 'fa-phone';
                break;
        }
    }

}
