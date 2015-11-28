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
	            FontAwesomeIconPickerField::create(
					'FAIcon',
					'Icon'
				),
				TextField::create(
					'TrackingID',
					'Tracking ID'
				)
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

	public function getTrackingAttr()
	{
		$attr = '';
		$siteConfig = SiteConfig::current_site_config();

		if($this->owner->TrackingID){
			if(isset($siteConfig->GoogleTagManager)){
				$id = Convert::raw2att(str_replace(' ','_',$this->owner->TrackingID));
				$attr .= " id='fa $id' ";
			}
			if(isset($siteConfig->GoogleAnaltyicsID)){
				$track = Convert::raw2att($this->owner->TrackingID);
				$attr .= " data-ga-label='$track' ";
			}
		}

		return $attr;
	}

	public function updateLinkTemplate($l, &$link)
	{
		if($url = $l->getLinkURL()) {
			$title = $l->Title ? $l->Title : $url; // legacy
			$target = $l->getTargetAttr();
			$class = $l->getClassAttr();
			$icon = $l->getIcon();
			$tracking = $l->getTrackingAttr();
			$link = "<a href='$url' $target $class $tracking>{$icon}$title</a>";
			return $link;
		}
	}
}
