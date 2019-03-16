<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'dtype';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div><h4>sql type</h4></div>
            <div class="col-lg-12">
            <?php $form = ActiveForm::begin();?>

                <?php
                echo $form->field($dtype, 'id')->label();
                echo $form->field($dtype, 'number');
                echo $form->field($dtype, 'text');
                echo $form->field($dtype, 'boolean')->checkbox();
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Надіслати', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
