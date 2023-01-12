
<?php 

// class example
class ShopProduct {    
    
    // constructor
    public function __construct(
        // properties in constructor (only php 8+)
        public string $title,
        public string $producerMainName = "",
        public string $producerFirstName = "",
        public int $price = 0){
    }
    
    // method
    public function getProducer() {
        return $this->producerFirstName." ".$this->producerMainName;
    }

}

$product = new ShopProduct(title: "Тридцатая любовь Марины","Владимир","Сорокин",price:750);
var_dump($product);

// var_export($product);
// print_r($product);

// print "Автор: {$product->producerFirstName} " . " {$product->producerMainName}\n";
// print $product->getProducer();

?>