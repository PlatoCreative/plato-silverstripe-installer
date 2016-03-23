<?php
/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactSubmissionAdmin extends ModelAdmin
{
    /**
     * Managed data objects for CMS
     * @var array
     */
    private static $managed_models = array(
        'ContactSubmission'
    );

    /**
     * URL Path for CMS
     * @var string
     */
    private static $url_segment = 'contactsubmissions';

    /**
     * Menu title for CMS
     * @var string
     */
    private static $menu_title = 'Contact Submissions';
}
