<?php
/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactSubmission extends DataObject
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'Name' => 'Text',
        'Email' => 'Varchar(250)',
        'Phone' => 'Varchar(20)',
        'Enquiry' => 'Text'
    );

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array(
        'Page' => 'SiteTree'
    );

    private static $summary_fields = array(
        'Name' => 'Name',
        'Email' => 'Email',
        'Phone' => 'Phone',
        'Page.Title' => 'Page',
        'Created.Nice' => 'Received'
    );

    /**
     * Default sort ordering
     * @var string
     */
    private static $default_sort = 'ID DESC';

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = new FieldList(
            ReadonlyField::create('Name','Name'),
            ReadonlyField::create('Email','Email address'),
            ReadonlyField::create('Phone','Phone number'),
            TextareaField::create('Enquiry','Enquiry Message')
                ->setAttribute('disabled','disabled'),
            ReadonlyField::create('ReadonlyPage', 'Enquiry from page')
                ->setValue($this->Page()->Title)
        );
        return $fields;
    }

    /**
     * Viewing Permissions
     * @return boolean
     */
    public function canView($member = null)
    {
        return true;
    }

    /**
     * Creating Permissions
     * @return boolean
     */
    public function canCreate($member = null)
    {
        return true;
    }

    /**
     * Editing Permissions
     * @return boolean
     */
    public function canEdit($member = null)
    {
        return true;
    }

    /**
     * Deleting Permissions
     * @return boolean
     */
    public function canDelete($member = null)
    {
        return true;
    }
}
