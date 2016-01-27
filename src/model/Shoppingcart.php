<?php
require_once('Base.php');
require_once('Product.php');

/**
 * 
 * @property Product[] $products
 */
class Shoppingcart extends Base
{
    /**
     *
     * @access public
	 * @var Product[]
     */
    const KEY_SESSION = 'shoppingcart';

    /**
     *
     * @access public
	 * @var Product[]
     */
    public $products;

    
    /**
     * Initialize the propierties
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->products = [];
    }

    /**
     * Add new product to the shopping cart
     *
     * @access public static
     * @return boolean
     */
    public static function addProduct($id_product)
    {
        if (!isset($_SESSION[Shoppingcart::KEY_SESSION][$id_product])) {
            $_SESSION[Shoppingcart::KEY_SESSION][$id_product]['id'] = $id_product;
            $_SESSION[Shoppingcart::KEY_SESSION][$id_product]['quantity'] = 1;
        }

        return true;
    }

    /**
     * Remove product from the shopping cart
     *
     * @access public static
     * @return boolean
     */
    public static function removeProduct($id_product)
    {
        if (isset($_SESSION[Shoppingcart::KEY_SESSION][$id_product])) {
            unset($_SESSION[Shoppingcart::KEY_SESSION][$id_product]);
        }

        return true;
    }

    /**
     * Return the number of products in the shopping cart
     *
     * @access public static
     * @return integer
     */
    public static function countProducts()
    {
        return count($_SESSION[Shoppingcart::KEY_SESSION]);
    }

    /**
     * Empty the shopping cart
     *
     * @access public static
     * @return boolean
     */
    public static function clean()
    {
        $_SESSION[Shoppingcart::KEY_SESSION] = [];

        return true;
    }

    /**
     * Return detaills of the shopping cart:
     *   count_products
     *   subtotal
     *   products
     *
     * @access public static
     * @return array
     */
    public static function getDetaills()
    {
        $shoppingcart = [
            'count_products' => 0,
            'products' => [],
        ];

        foreach ($_SESSION[Shoppingcart::KEY_SESSION] as $product) {
            $obj_product = Product::get($product['id']);

            if (!empty($obj_product)) {
                $shoppingcart['products'][$product['id']]['detaills'] = $obj_product;
                $shoppingcart['products'][$product['id']]['quantity'] = $product['quantity'];
                $shoppingcart['count_products']++;
            }
        }

        return $shoppingcart;
    }
}