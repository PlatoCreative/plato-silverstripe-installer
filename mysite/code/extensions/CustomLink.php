<?php
class CustomLink extends DataExtension
{
	private static $db = array(
        'FAIcon' => 'varchar',
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

	public function getIcon()
	{
		$icon = $this->owner->FAIcon ? Convert::raw2att( $this->owner->FAIcon ) : '';
		return $icon ? "<i class='fa $icon'></i>" : '';
	}

	public function getIDAttr()
	{
		$id = '';
		if($this->owner->TrackingID){
			$id = Convert::raw2att(str_replace(' ','_',$this->owner->TrackingID));
		}
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
