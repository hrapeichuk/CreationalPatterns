<?php

class Phone {
    private $name;
    private $os;

    public function setName($name) {
        $this->name = $name;
   }

    public function setOs($os) {
        $this->os = $os;
    }
}

abstract class BuilderPhone {
    protected $phone;

    public function getPhone() {
        return $this->phone;
    }

    public function createPhone() {
        $this->phone = new Phone();
    }

    abstract public function buildName();
    abstract public function buildOs();
}

class BuilderNexus4 extends BuilderPhone{
    public function buildName(){
        $this->phone->setName('Nexus4');
    }

    public function buildOs() {
        $this->phone->setOs("Android");
    }
}

class BuilderIphone5 extends BuilderPhone {
    public function buildName()
    {
        $this->phone->setName('Iphone5');
    }

    public function buildOs() {
        $this->phone->setOs("iOS");
    }
}

class Chooser {
    private $builderPhone;
    public function setBuilderPhone(BuilderPhone $mp) {
        $this->builderPhone = $mp;
    }

    public function getPhone() {
        return $this->builderPhone->getPhone();
    }

    public function constructPhone() {
        $this->builderPhone->createPhone();
        $this->builderPhone->buildName();
        $this->builderPhone->buildOs();
    }
}

$user = new Chooser();
$google = new BuilderNexus4();
$apple = new BuilderIphone5();
$user->setBuilderPhone($google);
$user->constructPhone();
$realPhone = $user->getPhone();
var_dump($realPhone);