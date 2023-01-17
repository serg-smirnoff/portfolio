<?php 
    
    // trait PriceUtilities
    trait PriceUtilities{
        private $taxrate = 20;
        public function calculateTax(float $price): float{
            return (($this->taxrate/100)*$price);
        }
        // Другие служебные методы
    }
    
    abstract class Service{
    }

    class ShopProduct{
        private int $taxrate = 20;
        // . . .
        public function calculateTax(float $price): float{
            return (($this->taxrate/100)*$price);
        }        
        // use Trait
        use PriceUtilities;
    }

    class UtilityService extends Service{
        // use Trait
        use PriceUtilities ;
    }

    $р = new ShopProduct();
    print $p->calculateTax(100)
    $u = new UtilityService();
    print $u->calculateTax(100);

?>