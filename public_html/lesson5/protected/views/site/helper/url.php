<?php
use yii\helpers\Url;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div>
                <h3><a href="https://www.yiiframework.com/doc/guide/2.0/uk/helper-url">helper-url</a></h3>
                <p>
                    <a href="<?php echo Url::previous();?>">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> back
                    </a>
                </p>
                <hr>
            </div>
            <div class="col-lg-12">
                Url::home();<p class="text-primary"> <?php echo Url::home();?></p>
                Url::home(true);<p class="text-primary"><?php echo Url::home(true);?></p>
                Url::home('https');<p class="text-primary"><?php echo Url::home('https');?></p>
                <hr>
            </div>

            <div class="col-lg-12">
                Url::base();<p class="text-primary"> <?php echo Url::base();?></p>
                Url::base(true);<p class="text-primary"><?php echo Url::base(true);?></p>
                Url::base('https');<p class="text-primary"><?php echo Url::base('https');?></p>
                <hr>
            </div>

            <div class="col-lg-12">
                Url::toRoute(['site/class', 'id' => 42]);
                <p class="text-primary"> <?php echo Url::toRoute(['site/class', 'id' => 42]);?></p>
                <p class="text-primary"> <?php echo Url::toRoute(['site', 'id' => 50, 'name' => 'Monika']);?></p>

                Url::to(['site/index', 'src' => 'ref1', '#' => 'name', 'content'=>'test string']);
                <p class="text-primary"> <?php echo Url::to(['site/index', 'src' => 'ref1', '#' => 'name', 'content'=>'test string']);?></p>
                <hr>
            </div>
        </div>
    </div>
</div>