<?php

/**
 * Description of Base
 *
 * @author p4scu41
 */
class Base
{
    /**
     * Empty constructor
     */
    public function __construct() { }

    /**
     * PHP getter magic method.
     * This method is overridden so that attributes can be accessed by function if it exists.
     * ie $this->myvar => $this->getMyvar();
     *
     * @param string $property property name
     * @return mixed property value
     */
    public function __get($property)
    {
        $functionGet = 'get' + ucfirst($property);

        if (method_exists($this, $function)) {
            return $this->$functionGet();
        }

        return $this->property;
    }

    /**
     * Generate a random value, use the function mt_rand
     *
     * @access public static
     * @return integer Random value
     */
    public static function generateID()
    {
        return mt_rand();
    }

    /**
     * Set the properties with the values given as array associative
     *
     * @param array Array associative
     * @access public
     */
    public function loadPropierties($values)
    {
        foreach ($values as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}