<?php
include_once ("Singleton.php");

abstract class NoteManager {
    abstract function setTime($value);
    abstract function getTime();
    abstract function setDescription($value);
    abstract function getDescription();
    abstract function getMeetingNotification();
    abstract function getToDoNotification();
}

class SocialNetworkNoteManager extends SocialNetworkMeetingNotification
{

    function setTime($value){
        $this->time = $value;
    }

    function getTime(){
        return $this->time;
    }

    function setDescription($value){
        $this->description = $value;
    }

    function getDescription(){
        return $this->description;
    }
    function getMeetingNotification(){
        return new SocialNetworkMeetingNotification();
    }

    function getToDoNotification(){
        return new SocialNetworkToDoNotification();
    }
}

class MailNoteManager extends MailMeetingNotification
{

    function setTime($value){
        $this->time = $value;
    }

    function getTime(){
        return $this->time;
    }

    function setDescription($value){
        $this->description = $value;
    }

    function getDescription(){
        return $this->description;
    }
    function getMeetingNotification(){
        return new MailMeetingNotification();
    }

    function getToDoNotification(){
        return new MailToDoNotification();
    }
}

abstract class MeetingNotification {
    protected $time;
    protected $description;
    abstract function create();
}

interface DisplayMeetingNotification {
    function display();
}

abstract class ToDoNotification {
    protected $time;
    protected $description;
    abstract function create();
}

interface DisplayToDoNotification {
    function display();
}

class SocialNetworkMeetingNotificationMaker extends MeetingNotification {
    function create(){
        return new SocialNetworkMeetingNotification();
    }
}

class MailMeetingNotificationMaker extends MeetingNotification {
    function create(){
        return new MailMeetingNotification();
    }
}

class SocialNetworkMeetingNotification implements DisplayMeetingNotification {
    function display(){
        echo("Оповещение о встрече было отправлено в вашу социальную сеть!") ;
    }
}

class MailMeetingNotification implements DisplayMeetingNotification {
    function display(){
        echo("Оповещение о встрече было отправлено на вашу почту!") ;
    }
}


class SocialNetworkToDoNotificationMaker extends ToDoNotification {
    function create(){
        return new SocialNetworkToDoNotification();
    }
}

class MailToDoNotificationMaker extends ToDoNotification {
    function create(){
        return new MailToDoNotification();
    }
}

class SocialNetworkToDoNotification implements DisplayToDoNotification {
    function display(){
        echo("Оповещение было отправлено в вашу социальную сеть!") ;
    }
}

class MailToDoNotification implements DisplayToDoNotification {
    function display(){
        echo("Оповещение было отправлено на вашу почту!") ;
    }
}


echo("Abstract Factory");
echo "<br><br>";
$meeting = new SocialNetworkNoteManager();
$meeting->getMeetingNotification()->display();
echo "<br><br>";
$meeting->getToDoNotification()->display();
echo "<br><br>";

$meeting = new MailNoteManager();
$meeting->getMeetingNotification()->display();
echo "<br><br>";
$meeting->getToDoNotification()->display();
echo "<br><br>";

echo("Factory Method");
echo "<br><br>";
$meeting = new SocialNetworkMeetingNotificationMaker();
$meeting->create()->display();
echo "<br><br>";

$haircut = new MailNoteManager();
$haircut->setTime("19:00");
$haircut->setDescription("str. Lev Tolstoi, 24/1 (Salon Marilyn)");
echo $haircut->getTime();
echo "<br><br>";
echo $haircut->getDescription();
echo "<br><br>";

$property = Property::getInstance();
$property->setProperty("email", "vitalina.hrapeichuk@gmail.com");
unset($property);
$new_property = Property::getInstance();
echo $new_property->getProperty("email");
