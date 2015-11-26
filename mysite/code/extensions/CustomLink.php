<?php
class CustomLink extends DataExtension{
	private static $db = array(
        'FontAwesomeIcon' => 'varchar',
		'TrackingID' => 'varchar'
    );

	public function updateCMSFields(FieldList $fields)
	{
        $fields->addFieldsToTab(
			'Root.Main',
			array(
	            FontAwesomeIconPickerField::create('FontAwesomeIcon', 'Font Awesome Icon'),
				TextField::create('TrackingID','Tracking ID')
	        ),
			'OpenInNewWindow'
		);
        return $fields;
    }

	public function getIcon() {
		$icon = $this->owner->FontAwesomeIcon ? Convert::raw2att( $this->owner->FontAwesomeIcon ) : '';
		return $icon ? "<i class='fa $icon'></i>" : '';
	}

	public function getIDAttr() {
		$id = $this->owner->TrackingID ? str_replace(' ','_',Convert::raw2att( $this->owner->TrackingID )) : '';
		return $id ? " id='fa $id'" : '';
	}

	public function updateLinkTemplate($l, &$link)
	{
		if($url = $l->getLinkURL()) {
			$title = $l->Title ? $l->Title : $url; // legacy
			$target = $l->getTargetAttr();
			$class = $l->getClassAttr();
			$icon = $l->getIcon();
			$id = $l->getIDAttr();
			$link = "<a href='$url' $target $class $id>{$icon}$title</a>";
			return $link;
		}
	}
}
