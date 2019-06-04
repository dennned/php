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

//print_r($man);
//print_r($woman);

class Form {
    public $x = 100;
    public $y = 50;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

class Trio extends Form {
    public $my = "Trio";
    public function __construct($x, $y)
    {
        parent::__construct($x, $y);
        $this->my;
    }
}

$cecl = new Form(11, 55);

$cecl->squere = "111";

$trio = new Trio(1,2);

//var_dump($trio);


//// static

class TestClass {

    private static $name;

    public static function setName($name1)
    {
        self::$name = $name1;
    }

    public static function getName()
    {
        return self::$name;
    }

    public static function getName1()
    {
        return static::$name;
    }
}

class One extends TestClass {
    private static $name = 'coucou';

    public static function getName()
    {
        return static::$name;
    }
}

TestClass::setName('Ivan');
One::setName('TEST');



////// Interface

interface UserInterface {
    public function getName($name, $role);

}
class Admin implements UserInterface {
    public function getName($name, $role)
    {
        echo "This is : ".$role." Your name is ".$name;
    }
}

$admin = new Admin();
$admin->getName("Dima", "Administrator");


///// Final
/*final*/ class Main {
    public $value = 'MAIN';
}
//Class Second may not inherit from final class (Main)
class Second extends Main {
    public function getValue()
    {
        echo " ::: ".$this->value;
    }
}

$new = new Second();
$new->getValue();
//echo $new->value;



//// Static
class UserOne {
    public static $name;

    public static function hello()
    {
        echo "Hello " .self::$name;
    }
}
UserOne::$name = 'Oleg';
//echo UserOne::$name;
//echo UserOne::hello();

/// Const
class constant {
    const CONSTA = "constant";

    public function getConst()
    {
        return self::CONSTA;
    }
}

//echo constant::CONSTA;


//// Abstract
abstract class Planet {
    public $age;
    abstract public function getName();

}

class Terre extends Planet {
    public function getName()
    {
        // TODO: Implement getName() method.
    }
}
// не возможно создать обьект класса Planet
$p = new Terre();
//var_dump($p);



//// Trait
class Base {
    public function sayHello()
    {
        echo "Hello";
    }
}
trait Hello {
    public function sayHello()
    {
        return "Hello";
    }
}
trait World {
    public function sayWorld()
    {
        return " World";
    }
}
class myClassOne  {
    use Hello, World;
}

$o = new myClassOne;
echo $o->sayHello();
echo $o->sayWorld();
