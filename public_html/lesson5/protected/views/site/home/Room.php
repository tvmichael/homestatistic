<?php
namespace home;

use yii\helpers\Html;

class Room extends Home
{
    public $area = 0;
    public $roomType = null;
    public $roomName = null;


    public function __construct($ob)
    {
        parent::__construct(['homeName'=>'Bob house']);

        if (isset($ob['roomName'])) $this->roomName = $ob['roomName'];
        else $this->roomName = 'Empty room';

    }

    public function setName($n)
    {
        $this->name = $n;
    }

    public function roomInfo()
    {
        echo Html::tag('p', 'Area:'.$this->area);
        echo Html::tag('p', 'Area:'.$this->roomName);
    }

    public function info()
    {
        array_push($this->room, ['area'=>$this->area]);

        parent::info();

        echo Html::tag('h4', 'Room');
        echo Html::tag('p', 'Area:'.$this->area);
        echo Html::tag('p', 'Area:'.$this->roomName);
    }


}