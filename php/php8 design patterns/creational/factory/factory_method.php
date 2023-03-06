<?php

    /* интерфейс
    */

    interface Phone{
        public function call();
    }

    /* фабрика (создает объекты классов 
     * с предопределенным интерфейсом)
     */

    class PhoneFactory{ 
        public function createCellPhone(): Phone {
            return new CellPhone();
        }
        public function createSmartPhone(): Phone {
            return new SmartPhone();
        }
    }
    
    /* класс CellPhone на основе интерфейса Phone
    */

    class CellPhone implements Phone{
        public function call(){
            echo "Привет я звоню с клавишного телефона!";
        }
        public function __toString(): string{
            return "Клавишный";
        }
    }
    
    /* класс SmartPhone на основе интерфейса Phone
    */

    class SmartPhone implements Phone{
        public function call(){
            echo "Привет я звоню с смартфона!";
        }
        public function __toString(): string{
            return "Мобильный";
        }
    }

    $factory = new PhoneFactory();
    
    $cell_phone = $factory->createCellPhone();
    $smart_phone = $factory->createSmartPhone();

    echo $cell_phone;
    echo "<br>";
    
    echo $smart_phone;
    echo "<br>";

    $cell_phone->call();
    echo "<br>";
    $smart_phone->call();
    echo "<br>";
