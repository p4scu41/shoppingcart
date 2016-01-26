<?php
require_once('Base.php');

/**
 * 
 * @property integer $id
 * @property string  $name
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
    public $name;

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
        $this->name = null;
        $this->description = null;
        $this->price = null;
        $this->image = null;
    }

    /**
     * Return an arrray of examples datas
     *
     * @access public static
     * @return array
     */
    public static function getAll()
    {
        return [
            725024 => [
                'id' => 725024,
                'name' => 'Est totam eius qui.',
                'description' => 'Quae magni et aut deserunt est consequatur. Maiores modi dolorem possimus sit. Amet iure id sequi dignissimos.',
                'price' => 332,
                'image' => 'https://placehold.it/350x200'
            ],
            4 => [
                'id' => 4,
                'name' => 'Dolores ut voluptatem id explicabo deleniti.',
                'description' => 'Aspernatur earum quibusdam maxime fuga. Qui et quam nam sunt.',
                'price' => 344,
                'image' => 'https://placehold.it/350x200'
            ],
            39 => [
                'id' => 39,
                'name' => 'Asperiores consequatur earum voluptas similique provident.',
                'description' => 'Amet voluptatem quos voluptate voluptates et vel iure. Iure impedit vero at eligendi.',
                'price' => 620,
                'image' => 'https://placehold.it/350x200'
            ],
            8513926 => [
                'id' => 8513926,
                'name' => 'Harum incidunt molestiae modi ea.',
                'description' => 'Nulla iusto qui officia voluptatem quis nulla consequatur. Veritatis animi eos vel id sed assumenda tenetur. Eum consequuntur provident voluptatem incidunt enim aliquam.',
                'price' => 782,
                'image' => 'https://placehold.it/350x200'
            ],
            888 => [
                'id' => 888,
                'name' => 'Id commodi eaque veritatis nesciunt.',
                'description' => 'Ut dolorem aperiam officiis autem. Nihil eum sit dignissimos aut. Vel maxime praesentium sint ratione dolorem.',
                'price' => 274,
                'image' => 'https://placehold.it/350x200'
            ],
            645 => [
                'id' => 645,
                'name' => 'Pariatur voluptatem velit laboriosam sit.',
                'description' => 'Nesciunt iste quia est incidunt rem consequuntur. Dolorem harum voluptates fugit modi rerum dolores ea. Recusandae deserunt rerum sed eligendi.',
                'price' => 327,
                'image' => 'https://placehold.it/350x200'
            ],
            5354 => [
                'id' => 5354,
                'name' => 'Accusamus et dolorem id officia.',
                'description' => 'Vel laudantium quo nobis facere et. Est sequi qui ipsa non et.',
                'price' => 426,
                'image' => 'https://placehold.it/350x200'
            ],
            356813 => [
                'id' => 356813,
                'name' => 'Velit esse inventore accusamus aut omnis.',
                'description' => 'Omnis facere magnam consequatur consequatur fugit vitae odit. Dolorum non corporis et magni voluptatem omnis. Non accusamus odit aspernatur magni modi aut nostrum numquam.',
                'price' => 306,
                'image' => 'https://placehold.it/350x200'
            ],
            32 => [
                'id' => 32,
                'name' => 'Quisquam voluptatibus voluptatem itaque.',
                'description' => 'Et omnis repudiandae eligendi nisi aliquid. Dolor veniam est omnis pariatur esse error illo.',
                'price' => 302,
                'image' => 'https://placehold.it/350x200'
            ],
            8592055 => [
                'id' => 8592055,
                'name' => 'Autem est qui eos eius velit.',
                'description' => 'Commodi voluptatibus velit maxime reprehenderit et maiores. Repellendus blanditiis eius molestiae nihil est. Officiis mollitia vitae cum vitae quidem.',
                'price' => 184,
                'image' => 'https://placehold.it/350x200'
            ],
            184 => [
                'id' => 184,
                'name' => 'Ex voluptas quidem dolore dolor.',
                'description' => 'Dolorem hic eaque ea qui soluta assumenda. Iusto cum quaerat modi expedita nostrum corrupti. Quia expedita itaque ut quia autem.',
                'price' => 466,
                'image' => 'https://placehold.it/350x200'
            ],
            8195 => [
                'id' => 8195,
                'name' => 'Laborum iusto suscipit consequatur dignissimos omnis.',
                'description' => 'Libero repellat sunt optio et optio. Aliquid beatae ipsa et nihil quos adipisci. Iusto adipisci in quos blanditiis cumque.',
                'price' => 144,
                'image' => 'https://placehold.it/350x200'
            ],
            67572 => [
                'id' => 67572,
                'name' => 'Sit et expedita eligendi.',
                'description' => 'Modi et quidem voluptas dolores architecto sed. Est minus totam ea dolor dolorem fuga dolorem hic. Assumenda unde voluptatem ut corrupti sequi amet architecto distinctio.',
                'price' => 766,
                'image' => 'https://placehold.it/350x200'
            ],
            2878 => [
                'id' => 2878,
                'name' => 'Inventore itaque est ea.',
                'description' => 'Qui maxime totam officia accusamus aut inventore omnis. Voluptas amet et facilis.',
                'price' => 338,
                'image' => 'https://placehold.it/350x200'
            ],
            311291 => [
                'id' => 311291,
                'name' => 'Architecto aperiam blanditiis ducimus dolorum.',
                'description' => 'Minus suscipit molestiae ut et repudiandae totam amet. Dolorem ipsum autem quia voluptatibus.',
                'price' => 227,
                'image' => 'https://placehold.it/350x200'
            ],
            522521 => [
                'id' => 522521,
                'name' => 'Eum cupiditate quis magni rerum aut.',
                'description' => 'Dolor sed natus eos enim inventore eos. In cum corrupti ratione eum beatae.',
                'price' => 983,
                'image' => 'https://placehold.it/350x200'
            ],
            590000 => [
                'id' => 590000,
                'name' => 'Quis quia vel nisi.',
                'description' => 'Est reiciendis in nostrum excepturi. Praesentium asperiores dolor exercitationem dolorem aut commodi rerum dolore. Corrupti aspernatur odit voluptatum quia quas.',
                'price' => 620,
                'image' => 'https://placehold.it/350x200'
            ],
            138669 => [
                'id' => 138669,
                'name' => 'Voluptatem praesentium autem.',
                'description' => 'Eum labore cumque rerum maxime laborum et est. Consequatur exercitationem voluptates consequatur nobis. Ut fugit est corporis tenetur nam eius dignissimos et.',
                'price' => 504,
                'image' => 'https://placehold.it/350x200'
            ],
            934515 => [
                'id' => 934515,
                'name' => 'Corrupti culpa aliquid perspiciatis ratione et.',
                'description' => 'Eos qui tenetur debitis quo non ullam. Dolorum voluptates velit ipsam. Veritatis delectus minus fugiat vitae maxime iusto.',
                'price' => 724,
                'image' => 'https://placehold.it/350x200'
            ],
            6 => [
                'id' => 6,
                'name' => 'Eligendi eum ipsa.',
                'description' => 'Fugiat quis et quaerat non unde dicta omnis. Totam rerum nisi laborum similique aspernatur cum.',
                'price' => 574,
                'image' => 'https://placehold.it/350x200'
            ]
        ];
    }

    /**
     * Return element of product as array associative
     *
     * @access public static
     * @param integer $id ID of the product
     * @return array | null
     */
    public static function get($id)
    {
        $products = Product::getAll();

        return isset($products[$id]) ? $products[$id] : null;
    }
}