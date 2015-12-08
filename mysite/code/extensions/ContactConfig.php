<?php
class ContactConfig extends DataExtension
{
    private static $db = array(
        'Email' => 'Varchar(255)',
        'PostalAddress' => 'Text',
        'PhysicalAddress' => 'Text'
    );

    private static $has_one = array(
        'MainPhone' => 'Phone'
    );

    private static $many_many = array(
        'Phones' => 'Phone'
    );

    private static $many_many_extraFields = array(
        'Phones' => array (
            'Sort' => 'Int'
        )
    );

    public function updateCMSFields(FieldList $fields)
	{
        $fields->addFieldsToTab(
            'Root.Contact',
            array(
                TextField::create(
                    'Email',
                    'Email address'
                )->setAttribute("placeholder", "email@domain.com"),
                GridField::create(
                    'Phones',
                    'Current phone number(s)',
                    $this->owner->Phones(),
                    GridFieldConfig_RelationEditor::create()
                        ->removeComponentsByType('GridFieldAddNewButton')
                        // ->addComponent(new GridFieldAddExistingSearchButton())
                        ->addComponent(new GridFieldEditableColumns())
                        ->addComponent(new GridFieldDeleteAction())
                        ->addComponent(new GridFieldAddNewInlineButton())
                        ->addComponent(new GridFieldOrderableRows())
                ),
                DropdownField::create(
                    'MainPhoneID',
                    'Main phone number',
                    Phone::get()->map('ID', 'Title')
                )->setEmptyString('None'),
                TextareaField::create(
                    'PostalAddress',
                    'Postal address'
                )->setRows(4),
                TextareaField::create(
                    'PhysicalAddress',
                    'Physical address'
                )->setRows(4)
            )
        );

        return $fields;
    }
}
