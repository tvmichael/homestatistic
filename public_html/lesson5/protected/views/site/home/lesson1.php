<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Class lessons';
?>
<div>
    <div>
        <h2>Clsss lessons</h2>
        <p>
            <a href="<?php echo Url::previous();?>">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> back
            </a>
        </p>
    </div>
    <div>
        <?php
        class TestClass
        {
            public $number = 1914;
            public $text = 'Text';

            //GET
            public function getText()
            {
                return $this->text;
            }

            public function getNumber()
            {
                return $this->number;
            }

            //SET
            public function setText($t)
            {
                $this->text = $t;
            }

            public function setNumber($n)
            {
                $this->text = $n;
            }

        }

        $c = 'TestClass';
        $c1 = new $c;

        echo $c1->getNumber();
        ?>
        <hr>
    </div>

    <div>
    <?php
        include_once 'Home.php';
        include_once 'Room.php';

        $room = new home\Room(['roomName'=>'My room!']);

        $room->area = 333;
        $room->info();

    ?>
    </div>
</div>
