<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Lesson - Form';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8"><h3 class="panel-title">Form</h3></div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo Url::previous();?>">
                                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    <?php $f = ActiveForm::begin();?>

                        <?=$f->field($form, 'login');?>

                        <?=$f->field($form, 'email');?>

                        <?=$f->field($form, 'password');?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>

                    <?php ActiveForm::end();?>
                    </div>
                </div>

            </div>

            <div class="col-lg-12">
                <div class="alert alert-warning">
                    Form:
                    <pre>
                        <?php print_r($form); ?>
                    </pre>
                    Errors:
                    <pre>
                        <?php print_r($errors); ?>
                    </pre>
                </div>
            </div>

        </div>
    </div>
</div>
