<?php


class MyClass {
    public $prop = "TEST property MyClass";
    public $nameClass = __CLASS__;

    public static $testStatic = 2019;

    public function __construct()
    {
        echo "LOAD CLASS ".$this->nameClass . "<br/>";
    }

    public function __destruct()
    {
        echo "DEstructor";
    }

    public function __toString() : string
    {
        echo "<br/> method toString <br/>";
        return $this->getProperty();

    }

    public function setProperty($value)
    {
        $this->prop = $value;
    }

    protected function getProperty()
    {
        return $this->prop." <br/>";
    }
}

class MyNewClsss extends MyClass {

    public static $testStatic = "new 2019";

    public function __construct()
    {
        parent::__construct();
        echo "new constructor ==> MyNewClsss";
    }

    public function newFunction()
    {
        echo " MyNewClsss ===>>> newFunction ";
    }

    public function newGetProperty()
    {
        return $this->getProperty();
    }
}

class Human {
    public $name;
    public $age;
    public $job;

    public function __construct($name, $age, $job)
    {
        $this->name = $name;
        $this->age = $age;
        $this->job = $job;
    }
}

class Man extends Human {
    public $sex = "This is a MAN";
}

class Woman extends Human {
    public $sex = "This is a WoMAN";
}

$man = new Man("John", 25, "web master");
$woman = new Woman("Eva", 20, "baby sitter");

print_r($man);
print_r($woman);
