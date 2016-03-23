<?php
/**
 * Adds contact form section
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactSection extends Section
{
    private static $title = "Contact form";
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'Title' => 'Text',
        'Content' => 'HTMLText',
        'SuccessContent' => 'HTMLText',
        'EmailSubject' => 'Text',
        'EmailTo' => 'Text',
        'SubmitButton' => 'Text'
    );

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab(
            'Root.Main',
            array(
                TextField::create('Title','Title'),
                HtmlEditorField::create('Content','Content'),
                HtmlEditorField::create('SuccessContent','Success content'),
                TextField::create('EmailSubject','Email subject')
                    ->setDescription('Comma separated email addresses'),
                TextField::create('EmailTo','Email to'),
                TextField::create('SubmitButton','Submit button')
            )
        );
        return $fields;
    }

    /**
	 * Template accessor for the form
	 **/
	public function ContactForm(){
		return $this->getController()->ContactForm();
	}
}

class ContactSection_Controller extends Section_Controller
{
    private static $allowed_actions = array(
        'ContactForm'
    );

    public function ContactForm()
    {
        // Create fields
        $fields = new FieldList(
            TextField::create('Name','Name'),
            EmailField::create('Email','Email'),
            TextField::create('Phone','Phone'),
            TextareaField::create('Enquiry','Enquiry')
        );

        // Create actions
        $actions = new FieldList(
            new FormAction('submit', 'Send Enquiry')
        );

        // Set required fields
        $validation = new RequiredFields('Name', 'Email', 'Enquiry');

        // return new Form($this, 'ContactForm', $fields, $actions, $validation);
        return new Form($this, 'ContactSection/ContactForm', $fields, $actions);
    }

    public function submit($data, $form) {
        $submission = new ContactSubmission();
        $form->saveInto($submission);
        $submission->write();
        return $this->redirect($this->CurrentPage->Link().'?submitted=1');
    }
}
