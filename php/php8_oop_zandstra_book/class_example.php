<?php 

// public (открытые)
// можно получать доступ из любого контекста 

// private (закрытые)
// можно получить доступ только из того класса, в котором они объявлены. 
// Даже подклассы данного класса не имеют доступа к таким свойствам и методам

// protected (защищенные)
// можно получить доступ либо из содержащего их класса, либо из его подкласса. 
// Никакому внешнему коду такой доступ не предоставляется

// class example
class ShopProduct {    
    
    // property discount
    private int|float $discount = 0;
    
    // Magic methods
    
    // constructor
    public function __construct(
                                // properties in constructor (only php 8+)
                                private string $title,
                                private string $producerMainName = "",
                                private string $producerFirstName = "",
                                protected int|float $price = 0
                               ){
    }
    
    public function __destruct(){
    }

    // Вызывается при клонировании объекта
    public function __call(){
        return 'Объект клонирован';
    }

    public function __clone(){
        return 'Объект клонирован';
    }
    
    // Вызывается при обращении к неопределенному свойству
    public function __wakeup(){
        return 'Свойство не определено';
    }




    // Методы перехватчики

    // Вызывается при обращении к неопределенному свойству
    public function __get(){
        return 'Свойство не определено';
    }
    
    // Вызывается, когда присваивается значение неопределенному свойству
    public function __set(){
        return 'Вы пытаетесь присвоить значение неопределенному свойству';
    }

    // Вызывается, когда функция isset() вызывается для неопределенного свойства
    public function __isset(){
    }
    
    // Вызывается, когда функция unset() вызывается для неопределенного свойства
    public function __unset(){
    }
    
    // Вызывается при обращении к неопределенному нестатическому методу
    public function __call(){
    }

    // method getProducerFirstName()
    public function getProducerFirstName() : string {
        return $this->producerFirstName;
    }

    // method getProducerMainName()
    public function getProducerMainName(): string {
        return $this->producerMainName;
    }
    
    // method getDiscount()
    public function setDiscount(int|float $num): void {
        $this->discount = $num;
    }
    
    // method setDiscount()
    public function getDiscount(): int {
        return $this->discount;
    }
    
    // method getTitle()
    public function getTitle() : string {
        return $this->title;
    }

    // method getPrice()
    public function getPrice(): int|float {
        return ($this->price - $this->discount);
    }
    
    // method getProducer()
    public function getProducer() : string {
        return $this->producerFirstName ." ". $this->producerMainName;
    }

    
    public function getSummaryLine(): string {
        $base = "{$this->title} ({$this->producerMainName}, {$this->producerFirstName})";
        return $base;
    }
}

// CDProduct extends ShopProduct

// В языке РНР поддерживается наследование только от одного родителя
// (так называемое одиночное, или простое, наследование), поэтому после
// ключевого слова extends можно указать только одно имя базового класса.

class CDProduct extends ShopProduct{
    public function __construct(string $title,
                            string $firstName,
                            string $mainName,int|float $price,
                            private int $playLength
                           ){
        parent::__construct($title,$firstName,$mainName,$price);
    }
    public function getPlayLength () : int{
        return $this->playLength;
    }
    public function getSummaryLine(): string{
        $base = "{$this->title}({$this->producerMainName}, {$this->producerFirstName})";
        $base .= "Время звучания - {$this->playLength}";
        return $base;
    }
}

// BookProduct extends ShopProduct
class BookProduct extends ShopProduct{
    
    public function __construct(string $title,
                                string $firstName,
                                int|float $price,
                                string $mainName, 
                                private int $numPages){
        parent::__construct ($title,$firstName,$mainName,$price );
    }

    public function getNumberOfPages() : int{
        return $this >numPages;
    }
    
    public function getSummaryLine() : string{
        $base = parent::getSummaryLine();
        $base .= " : {$this->numPages} стр . ";
        return $base;
    }
    
    public function getPrice() : int|float{
        return $this->price;
    }

}

$product = new ShopProduct("Тридцатая любовь Марины","Владимир","Сорокин",750);
// var_dump($product);

// var_export($product);
// print_r($product);

// print "Автор: {$product->getProducerFirstName()} " . " {$product->getProducerMainName}\n";
print $product->getProducer();
$product->setDiscount(10);
print $product->getPrice();


// class ShopProductWriter{
//     private $products = [];
//     public function addProduct(ShopProduct $shopProduct) : void {
//         $this->products[] = $shopProduct;
//     }
//     public function write () : void {
//         $str = "";
//         foreach ($this->products as $shopProduct){
//             $str .= "{$shopProduct->title}: ";
//             $str .= $shopProduct->getProducer();
//             $str .= "({$shopProduct->getPrice()})\n";
//         }
//         print $str;
//     }
// }

// $sp_writer = new ShopProductWriter();

// $sp_writer->addProduct($product);
// $sp_writer->write();

?>