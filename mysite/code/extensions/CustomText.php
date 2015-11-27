<?php
class CustomText extends DataExtension
{
	/**
	  * Removes spaces from this StringField.
	  *
	  * @return string
	  */
	public function NoSpaces()
	{
		return str_replace(' ', '', $this->owner->value);
	}

	/**
	  * Provides string replace on StringField
	  *
	  * @return string
	  */
	public function StrReplace($search = ' ', $replace = '')
	{
		return str_replace($search, $replace, $this->owner->value);
	}

	public function PhoneFriendly()
	{
		$ReplacementPattern = array(
			'a' => '2',
			'b' => '2',
			'c' => '2',
			'd' => '3',
			'e' => '3',
			'f' => '3',
			'g' => '4',
			'h' => '4',
			'i' => '4',
			'j' => '5',
			'k' => '5',
			'l' => '5',
			'm' => '6',
			'n' => '6',
			'o' => '6',
			'p' => '7',
			'q' => '7',
			'r' => '7',
			's' => '7',
			't' => '8',
			'u' => '8',
			'v' => '8',
			'w' => '9',
			'x' => '9',
			'y' => '9',
			'z' => '9',
			'+' => '00',
			' ' => '',
		);
		return str_ireplace(array_keys($ReplacementPattern), array_values($ReplacementPattern), $this->owner->value);
	}

	public function URLFriendly()
	{
		return str_replace(' ', '_', strtolower($this->owner->value));
	}
}
