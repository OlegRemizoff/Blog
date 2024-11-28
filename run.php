<?php 



class Product 
{
    public function __construct
    (
        public string $title,
        public int $price 
    )
    {

    }
    
}


class Cart 
{    
    public array $data = [];

    public function add(Product... $product) {
        $this->data[] = $product;
        return $this;
    }

    public function getTotal(): int|float {
        $total = 0;
        foreach ($this->data as $item) {
            var_dump($item);
            $total += $item->price;
        }
        return  $total;
    }
    
}


class Phone extends Product
{
    public string $cpu;

    public function __construct($title, $price, $cpu)
    {
        parent::__construct($cpu, $price);
        $this->cpu = $cpu;
    }

}

class Book extends Product 
{
    public int $pages;

    public function __construct
    (
        $title,
        $price, 
        $pages
    )
    {
        parent::__construct($title, $price);
        $this->pages = $pages;
    }
}





$cart = new Cart();
$product1 = new Phone('nokia n73', 7490, 'MediaTek');
$product2 = new Book('The witcher', 1350, 520);

// echo $cart->add(['title' => 'nokia n73', 'price' => 7490])->getTotal() . PHP_EOL;

echo $cart->add($product1, $product2)->getTotal();
// echo Cart::getTotal();

// $data = [];
// $data['title'] = $product1->title;
// $data['price'] = $product1->price;
// print_r($data);


