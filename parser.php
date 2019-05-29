<?php

class Parser {
    protected $text;
    protected $position;

    public function __construct($text)
    {
        $this->text = $text;
        $this->position = 0;
    }

    public function moveTo($find)
    {
        $this->position = strpos($this->text, $find, $this->position) + strlen($find);

        return $this;
    }

    public function readTo($find)
    {
        $start = $this->position;
        $this->moveTo($find);

        return substr($this->text, $start, $this->position - $start - strlen($find));
    }
}

$text = '....
        <span>test</span>
        Test Test TEXT
        <a href="#"><span>150</span></a>';

$parser = new Parser($text);
//var_dump($parser);

echo $parser->moveTo('<a href="#">')->moveTo('<span>')->readTo('<');
