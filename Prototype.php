<?php

abstract class BookPrototype {
    protected $title;
    protected $topic;
    abstract function __clone();
    function getTitle() {
        return $this->title;
    }
    function setTitle($titleIn) {
        $this->title = $titleIn;
    }
    function getTopic() {
        return $this->topic;
    }
}

class PHPBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'PHP';
    }
    function __clone() {
    }
}

class SQLBookPrototype extends BookPrototype {
    function __construct() {
        $this->topic = 'SQL';
    }
    function __clone() { // клонирующий метод
    }
}


$phpProto = new PHPBookPrototype();
$sqlProto = new SQLBookPrototype();


$book1 = clone $sqlProto;
$book1->setTitle('SQL For Cats');
echo ("Book number 1 topic: ".$book1->getTopic()."<br><br>");
echo ("Book number 1 title: ".$book1->getTitle());

$book2 = clone $phpProto;
$book2->setTitle('OReilly Learning PHP 5');
echo "<br><br>";
echo ("Book number 2 topic: ".$book2->getTopic()."<br><br>");
echo ("Book number 2 title: ".$book2->getTitle());

$book3 = clone $sqlProto;
$book3->setTitle('OReilly Learning SQL');
echo "<br><br>";
echo ("Book number 3 topic: ".$book3->getTopic()."<br><br>");
echo ("Book number 3 title: ".$book3->getTitle());
