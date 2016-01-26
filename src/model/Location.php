<?php
require_one('Base.php');

/**
 * 
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $street
 */
class Location extends Base
{
    /**
     *
     * @access public
     * @var string
     */
    var $country;

    /**
     * State/Province/Region
     *
     * @access public
     * @var string
     */
    var $state;

    /**
     *
     * @access public
     * @var string
     */
    var $city;

    /**
     *
     * Zip Code/Postal Code
     *
     * @access public
     * @var string
     */
    var $zip_code;

    /**
     *
     * @access public
     * @var string
     */
    var $street;

}