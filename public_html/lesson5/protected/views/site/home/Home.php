<?php
namespace home;

use yii\helpers\Html;

class Home
{
    public $room = [];
    public $areaInSide = 0;
    public $areaOutSide = 100;
    public $areaAll = 0;
    public $homeName = null;

    public function __construct($ob)
    {
        if (isset($ob['homeName'])) $this->homeName = $ob['homeName'];
        else $this->homeName = 'Empty home';
    }

    public function getAreaAll()
    {
        return $this->areaInSide + $this->areaOutSide;
    }
    public function setAreaInSide($area)
    {
        $this->areaInSide = $area;
    }
    public function setAreaOutSide($area)
    {
        $this->areaOutSide = $area;
    }

    public function info()
    {
        $this->areaAll = $this->areaOutSide;
        foreach ($this->room as $r)
            $this->areaAll += $r['area'];

        echo '<pre>';
        print_r($this);
        echo '</pre>';

        echo Html::tag('h4', 'Home');
        echo Html::tag('p', 'Area all:'.$this->areaAll);
        echo Html::tag('p', 'Name home:'.$this->homeName);
    }


}