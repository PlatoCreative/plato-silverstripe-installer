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

    private static $description = "Displays a contact form";

    private static $limit = 1;

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
        'EmailFrom' => 'Text',
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
                TextField::create('EmailSubject','Email subject'),
                TextField::create('EmailTo','Email to')
                    ->setDescription('Comma separated email addresses'),
                TextField::create('EmailFrom','Email from'),
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
            TextField::create('Name','Name')
                ->setAttribute('required data-parsley-error-message', 'Please enter your name.'),
            EmailField::create('Email','Email')
                ->setAttribute('required data-parsley-error-message', 'Please enter your email address.'),
            TextField::create('Phone','Phone number'),
            TextareaField::create('Enquiry','Enquiry')
                ->setRows(8)
                ->setAttribute('required data-parsley-error-message', 'Please enter your enquiry.')
        );

        // Create actions
        $actions = new FieldList(
            FormAction::create('submit', 'Send Enquiry')
        );

        // Set required fields
        $validation = new RequiredFields(
            array(
                'Name',
                'Email',
                'Enquiry'
            )
        );

        $form = new Form($this, 'ContactSection/ContactForm', $fields, $actions);
        $form->setAttribute('data-parsley-validate', true);
        $form->setFormMethod('POST', true);

        $this->extend('UpdateSectionForm', $form);

        // return new Form($this, 'ContactForm', $fields, $actions, $validation);
        return new Form($this, 'ContactSection/ContactForm', $fields, $actions);
    }

    public function submit($data, $form) {
        $submission = new ContactSubmission();
        $form->saveInto($submission);
        $submission->PageID = $this->getCurrentPage()->ID;
        $submission->write();

        // Send email confirmation
        $emailTo = $this->EmailTo ? $this->EmailTo : 'web@platocreative.co.nz';
        $emailFrom = $this->EmailFrom ? $this->EmailFrom : 'noreply@' . Director::baseURL();
        $subject = $this->EmailSubject . ' - Online Enquiry';
        $message = "<h3>Online Enquiry</h3>";
        $message .= "<p>Name:<br />" . $data['Name'] . "</p>";
        $message .= "<p>Email:<br />" . $data['Email'] . "</p>";
        $message .= "<p>Phone:<br />" . $data['Phone'] . "</p>";
        $message .= "<p>Enquiry:<br />" . $data['Enquiry'] . "</p>";

        $this->extend('UpdateSendSectionForm', $emailTo, $emailFrom, $subject, $message);

        $email = new Email($emailFrom, $emailTo, $subject, $message);
        if ($email->send()) {
            // return $this->SuccessMessage;
            return $this->redirect($this->CurrentPage->Link().'?submitted=1');
        }
        // return false;
        return $this->redirect($this->CurrentPage->Link().'?failed=1');
    }
}
