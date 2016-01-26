<?php
require_one('Base.php');
require_one('Location.php');

/**
 * 
 * @property integer  $id
 * @property string   $first_name
 * @property string   $middle_name
 * @property string   $last_name
 * @property string   $full_name
 * @property date     $birthdate
 * @property string   $phone
 * @property string   $email
 * @property string   $password
 *
 * @property Location $address
 */
class Client extends Base
{

    /**
     * Uniqued identifier of the instance
     *
     * @access public
	 * @var integer
     */
    public $id;

    /**
     *
     * @access public
	 * @var string
     */
    public $first_name;

    /**
     *
     * @access public
	 * @var string
     */
    public $middle_name;

    /**
     *
     * @access public
	 * @var string
     */
    public $last_name;

    /**
     * Join of $first_name + $middle_name + $last_name
     *
     * @access public
	 * @var string
     */
    public $full_name;

    /**
     *
     * @access public
	 * @var date
     */
    public $birthdate;

    /**
     *
     * @access public
	 * @var string
     */
    public $phone;

    /**
     *
     * @access public
	 * @var string
     */
    public $email;

    /**
     *
     * @access public
	 * @var string
     */
    public $password;

    /**
     *
     * @access public
	 * @var Location
     */
    public $address;

    /**
     * Return the join of $first_name + $middle_name + $last_name
     *
     * @access public
     * @return string Join of $first_name + $middle_name + $last_name
     */
    public function getFull_name()
    {
        return $this->first_name + ' ' +
               $this->middle_name + ' ' +
               $this->last_name;
    }

    /**
     * Initialize the propierties
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->id = Base::generateID();
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->full_name = null;
        $this->birthdate = null;
        $this->phone = null;
        $this->email = null;
        $this->password = null;
        $this->address = new Location();
    }
}