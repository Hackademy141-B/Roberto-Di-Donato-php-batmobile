<?php
// BatMobile

abstract class Front{
    public abstract function attack();
}

abstract class Back{
    public abstract function defence();
}

class Lanciarazzi extends Front {

    use Fire;

    public function attack(){
        echo "Boom, esploso \n";
    }
}

class MachineGun extends Front{
    public function attack(){
        echo "mitragliatrice \n";
    }
}

class Oil extends Back{
    public function defence(){
        echo "Scivola \n";
    }
}

class Shield extends Back{
    public function defence(){
        echo "Scudo \n";
    }

}

trait Fire{
    public function burn(){
        echo "Fuoco \n";
    }

}

class BatMobile{
    public $Front;
    public $Back;

    public function __construct(Front $FrontSide , Back $BackSide){
        $this->Front = $FrontSide;
        $this->Back = $BackSide;
    }

    public function attackButton(){
        $this->Front->attack();
        if($this->Front instanceof Lanciarazzi){
            $this->Front->burn();
        }
    }

    public function defenceButton(){
        $this->Back->defence();
    }

}

$Batman1 = new BatMobile(new Lanciarazzi(), new Oil());
$Batman1->attackButton();
$Batman1->defenceButton();
