<?php
require_once('Base.php');
require_once('Location.php');
require_once('Payment.php');

/**
 * 
 * @property integer $id
 * @property integer $tax_percent
 * @property float   $tax_amount
 * @property integer $count_products
 * @property float   $subtotal
 * @property float   $total
 * @property date    $date
 *
 * @property Product[] $products
 * @property Location  $shipment
 * @property Payment  $payment
 */
class Purchase extends Base
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
	 * @var integer
     */
    public $tax_percent;

    /**
     *
     * @access public
	 * @var float
     */
    public $tax_amount;

    /**
     *
     * @access public
	 * @var integer
     */
    public $count_products;

    /**
     *
     * @access public
	 * @var float
     */
    public $subtotal;

    /**
     *
     * @access public
	 * @var float
     */
    public $total;

    /**
     *
     * @access public
	 * @var date
     */
    public $date;

    /**
     *
     * @access public
	 * @var Product[]
     */
    public $products;

    /**
     *
     * @access public
	 * @var Location
     */
    public $shipment;

    /**
     *
     * @access public
	 * @var Payment
     */
    public $payment;

    
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
        $this->tax_percent = 13;
        $this->tax_amount = null;
        $this->count_products = null;
        $this->subtotal = null;
        $this->total = null;
        $this->date = null;
        $this->products = [];
        $this->shipment = new Location();
        $this->payment = new Payment();
    }
}