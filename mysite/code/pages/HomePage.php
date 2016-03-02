<?php
/**
 * HomePage
 *
 * @package silverstripe
 * @subpackage mysite
 */
class HomePage extends Page
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array();

    /**
     * Has_one relationship
     * @var array
     */
    private static $has_one = array();

    /**
     * Has_many relationship
     * @var array
     */
    private static $has_many = array();

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
class HomePage_Controller extends Page_Controller
{
    function init() {
        parent::init();
    }
}
