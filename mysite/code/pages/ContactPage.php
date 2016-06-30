<?php

/**
 * Creates a contact page type
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactPage extends UserDefinedForm
{
    private static $icon = 'mysite/images/contact.png';

    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'ExtraContent' => 'HTMLText'
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Main Tab
        $fields->addFieldsToTab(
            'Root.Main',
            array(
                HTMLEditorField::create('ExtraContent', 'Extra Content Area')
            ),
            'Metadata'
        );

        return $fields;
    }

}
class ContactPage_Controller extends UserDefinedForm_Controller
{
    public function init() {
        parent::init();
    }
}
