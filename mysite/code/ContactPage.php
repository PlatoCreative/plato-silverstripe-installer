<?php
class ContactPage extends UserDefinedForm {

	private static $icon = 'mysite/images/contact.png';

	private static $db = array(
	);

	private static $has_one = array(
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();

		return $fields;
	}
}
class ContactPage_Controller extends UserDefinedForm_Controller {

	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}

}
