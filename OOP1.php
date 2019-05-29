<?php


class Test
{
    public $name;
    public $age;
    public $job;

    public function getInfo()
    {
        return "This is ".$this->name. " I am ".$this->age. " and I am a ". $this->job;
    }
}

$new = new Test();
$new->name = "Ivan Dorn";
$new->age = 25;
$new->job = "develloper";

interface Speaker {
    public function sayHello();
}

class EnglishMan implements Speaker {
    public function sayHello()
    {
        echo "HEllO!";
    }
}

class FrenchMan implements Speaker {
    public function sayHello()
    {
        echo "BONJOUR!";
    }
}

$french = new FrenchMan();
$french->sayHello();

$english = new EnglishMan();
$english->sayHello();
