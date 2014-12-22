<?php
class HomePage extends Page {

  private static $db = array(
  );

  private static $has_one = array(
  );

  private static $has_many = array(
  );
  
  function getCMSFields() {
    $fields = parent::getCMSFields();

    return $fields;
  }
  
}

class HomePage_Controller extends Page_Controller {
  
  public function init(){
    parent::init();
    
  }
  
  private static $allowed_actions = array (
  );

}