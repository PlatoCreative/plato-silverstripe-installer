<?php

/**
 * Adds an apearance tab to site config
 *
 * @package silverstripe
 * @subpackage mysite
 */
class AppearanceConfig extends DataExtension
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'NavgationLevel' => 'Int'
    );

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
	{
        if ($themeField = $fields->fieldByName('Root.Main.Theme')) {
            $fields->removeFieldFromTab('Root.Main', 'Theme');
            $fields->addFieldToTab('Root.Appearance', $themeField);
        }

        // Navigation
        $fields->addFieldsToTab(
            'Root.Appearance',
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
