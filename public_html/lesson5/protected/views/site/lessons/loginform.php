<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 20.01.2019
 * Time: 20:31
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h2>Login Form</h2>

<?php
$form = ActiveForm::begin([
    'id'=> 'login-form',
    'options' => [
        'class'=>'form-horizontal'
    ]
]);

echo $form->field($model, 'username')->textInput()->hint('Enter name')->label('Name');
echo $form->field($model, 'password')->passwordInput();
?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?php echo Html::submitButton('Login', ['class'=>'btn btn-primary']);?>
    </div>
</div>

<?php ActiveForm::end();?>

