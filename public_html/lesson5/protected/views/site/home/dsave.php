<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'dtype';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div><h4>sql save</h4></div>
            <div class="col-lg-12">


                <?php
                echo Html::tag('p', $dtype->number);
                echo Html::tag('p', $dtype->text);
                echo Html::tag('p', $dtype->boolean);
                ?>


            </div>
        </div>
    </div>
</div>
