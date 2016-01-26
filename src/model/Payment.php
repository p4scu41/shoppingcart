<?php
require_once('Base.php');

/**
 * 
 * @property string $card_type
 * @property string $card_number
 * @property date   $expiration_date
 */
class Payment extends Base
{

    /**
     *
     * @access public
	 * @var string
     */
    public $card_type;

    /**
     *
     * @access public
	 * @var string
     */
    public $card_number;

    /**
     *
     * @access public
	 * @var date
     */
    public $expiration_date;

    /**
     * Initialize the propierties
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->card_type = null;
        $this->card_number = null;
        $this->expiration_date = null;
    }
}