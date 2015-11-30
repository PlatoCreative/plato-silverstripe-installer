<?php
class AppearanceConfig extends DataExtension
{
    private static $db = array(
        'NavgationLevel' => 'Int'
    );

    private static $has_one = array();

    private static $has_many = array();

    public function updateCMSFields(FieldList $fields)
	{
        if ($themeField = $fields->fieldByName('Root.Main.Theme')) {
            $fields->removeFieldFromTab('Root.Main', 'Theme');
            $fields->addFieldToTab('Root.Appearance.Main', $themeField);
        }
        // Navigation
        $fields->addFieldsToTab(
            'Root.Appearance.Navigation',
            array(
                DropdownField::create(
                    'NavgationLevel',
                    'Max navigation level',
                    array(
                        0 => 'Infinite',
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                        6 => '6',
                        7 => '7',
                        8 => '8',
                        9 => '9',
                    )
                )
            )
        );
        return $fields;
    }
}
