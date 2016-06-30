<?php

/**
 * Adds methods to strings
 *
 * @package silverstripe
 * @subpackage mysite
 */
class StringFieldExtension extends DataExtension
{
    /**
     * Removes spaces from this StringField.
     *
     * @return string
     */
    public function RemoveSpaces()
    {
        return str_replace(' ','',$this->owner->value);
    }

    /**
     * Provides string replace on StringField
     *
     * @return string
     */
    public function StrReplace($search = ' ', $replace = '')
    {
        return str_replace($search,$replace,$this->owner->value);
    }

    /**
     * Provides string replace on StringField
     *
     * @return string
     */
    public function PhoneFriendly()
    {
        $ReplacementMap = array(
            'a'=>'2', 'b'=>'2', 'c'=>'2',
            'd'=>'3', 'e'=>'3', 'f'=>'3',
            'g'=>'4', 'h'=>'4', 'i'=>'4',
            'j'=>'5', 'k'=>'5', 'l'=>'5',
            'm'=>'6', 'n'=>'6', 'o'=>'6',
            'p'=>'7', 'q'=>'7', 'r'=>'7', 's'=>'7',
            't'=>'8', 'u'=>'8', 'v'=>'8',
            'w'=>'9', 'x'=>'9', 'y'=>'9', 'z'=>'9',
            '+'=>'00',
            ' '=>''
        );
        $value = str_ireplace(
            array_keys($ReplacementMap),
            array_values($ReplacementMap),
            $this->owner->value
        );
        $value = preg_replace('/[^0-9\+]+/','',$value);
        return $value;
    }

    /**
     * Provides string replace on StringField
     *
     * @return string
     */
    public function LinkFriendly()
    {
        return Convert::raw2url($this->owner->value);
    }

    /**
     * Provides string replace on StringField
     *
     * @return string
     */
    public function URLFriendly()
    {
        return Convert::raw2url($this->owner->value);
    }

    /**
     * Converts camel case to space separated string
     * @return string
     */
    public function Nice()
    {
        $value = preg_replace('/([A-Z])/',' $1',$this->owner->value);
        $value = trim($value);
        return $value;
    }
}
