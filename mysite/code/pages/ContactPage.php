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
        'ExtraContent' => 'HTMLText',
        'GoogleMap' => 'Text'
    );

    /**
     * Many_many relationship
     * @var array
     */
    private static $many_many = array(
        'Links' => 'Link'
    );

    /**
     * {@inheritdoc }
     * @var array
     */
    private static $many_many_extraFields = array(
        'Links' => array(
            'Sort' => 'Int'
        )
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

        $fields->addFieldsToTab(
            'Root.Links',
            array(
                GridField::create(
                    'Links',
                    'Link(s)',
                    $this->Links(),
                    GridFieldConfig_RelationEditor::create()
                        ->addComponent(new GridFieldOrderableRows())
                )
            )
        );

        // Google Map
        $fields->addFieldsToTab(
            'Root.GoogleMap',
            array(
                TextField::create('GoogleMap', 'Google Map URL')
            )
        );

        return $fields;
    }

    // Google Map
    public function LatLong() {
       $ll = preg_match('/\@([-.0-9]+),([-.0-9]+)/', $this->GoogleMap, $matches);
       return $ll ? ArrayData::create(array('Latitude' => $matches[1], 'Longitude' => $matches[2], 'Nice' => $matches[1] . ',' . $matches[2])) : null;
    }
}
class ContactPage_Controller extends UserDefinedForm_Controller
{
    public function init() {
        parent::init();
    }
}
