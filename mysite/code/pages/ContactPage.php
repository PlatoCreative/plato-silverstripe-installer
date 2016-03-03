<?php
/**
 * Contact Page
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactPage extends UserDefinedForm
{

    private static $icon = 'mysite/img/contact.png';

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
        'Phones' => 'Phone'
    );

    /**
     * {@inheritdoc }
     * @var array
     */
    private static $many_many_extraFields = array(
        'Phones' => array (
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
            'Root.Phone',
            array(
                GridField::create(
                    'Phones',
                    'Current phone number(s)',
                    $this->Phones(),
                    GridFieldConfig_RelationEditor::create()
                        ->removeComponentsByType('GridFieldAddNewButton')
                        // ->addComponent(new GridFieldAddExistingSearchButton())
                        ->addComponent(new GridFieldEditableColumns())
                        ->addComponent(new GridFieldDeleteAction())
                        ->addComponent(new GridFieldAddNewInlineButton())
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
    private static $allowed_actions = array ();

    public function init() {
        parent::init();
    }
}
