<?php


class Writer {
    protected $fileName;
    protected $file;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->file = fopen($fileName, "w");
    }

    public function write($text)
    {
        if (is_writable($this->fileName)) {
            fwrite($this->file, $text);
        } else {
            echo "ERROR write to file";
        }

        echo "Writting to file... <br/>";

        fclose($this->file);
    }
}

class Reader {
    protected $fileName;
    protected $file;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        if (file_exists($fileName)) {
            $this->file = fopen($fileName, "r") or die("Unable to open file!");
        } else {
            echo "ERROR OPEN FILE!";
        }
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function readFile()
    {
        return fread($this->file, filesize($this->fileName));
    }
}

$file = "test.txt";

$writeToFile = new Writer($file);
$writeToFile->write('hello world!');

$readFile = new Reader($file);

echo 'TEXT : '.$readFile->readFile();

