<?php
class CustomSiteConfig extends DataExtension
{
    private static $db = array();
    private static $has_one = array();
    private static $has_many = array();
    public function updateCMSFields(FieldList $fields)
    {
        return $fields;
    }
}
