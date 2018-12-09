<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">

            <div class="col-md-12">
                <hr><h3>Getting starter</h3>
                <div class="col-md-3">
                    <h4>Working with Forms</h4>
                    <p><a class="" href="<?php echo Url::to(['/site/lessons','lesson'=>'form']);?>">form</a></p>
                </div>
            </div>

            <div class="col-md-12">
                <hr><h3>Helper</h3>
                <div class="col-md-3">
                    <h4>yii\helpers\Url;</h4>
                    <p><a class="" href="<?php echo Url::toRoute(['site/helper','helper'=>'url']);?>">url</a></p>
                </div>
                <div class="col-md-3">
                    <h4>yii\helpers\Html;</h4>
                    <p><a class="" href="<?php echo Url::to(['/site/helper','helper'=>'html']);?>">html</a></p>
                </div>
                <div class="col-md-3">
                    <h4>yii\helpers\Html::Form;</h4>
                    <p><a class="" href="<?php echo Url::to(['/site/helper','helper'=>'form']);?>">form</a></p>
                </div>

            </div>

            <div class="col-md-12">
                <hr><h3>Clas 'Home' lessons</h3>
                <div class="col-lg-12">
                    <p>
                        <a class="" href="<?php echo Url::to(['site/home', 'lesson'=>1]);?>">open lesson 1</a>
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <hr><h3>CSS</h3>
                <div class="col-lg-12">
                    <p>
                        <a class="" href="<?php echo Url::to(['site/css', 'lesson'=>'background']);?>">css background</a>
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <hr><h3>Date Time </h3>
                <div class="col-lg-12">
                    <p>
                        <a class="btn btn-default btn-xs" href="<?php echo Url::to(['site/calendar', 'version'=>1]);?>">Calendar v1. </a>

                        <a class="btn btn-default btn-xs" href="<?php echo Url::to(['site/calendar', 'version'=>2]);?>">Calendar v2. </a>
                    </p>
                </div>
            </div>

            <?php Url::remember();?>
        </div>
    </div>
</div>
