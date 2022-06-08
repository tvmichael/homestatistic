<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Spending */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spending-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productId')->textInput() ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput(['type' => 'datetime-local']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
