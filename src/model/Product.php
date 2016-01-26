<?php
require_one('Base.php');

/**
 * 
 * @property integer $id
 * @property string  $description
 * @property float   $price
 * @property string  $image
 */
class Product extends Base
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
    public $description;

    /**
     *
     * @access public
	 * @var float
     */
    public $price;

    /**
     *
     * @access public
	 * @var string
     */
    public $image;

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
        $this->description = null;
        $this->price = null;
        $this->image = null;
    }
}