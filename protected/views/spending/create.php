<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spending */

$this->title = Yii::t('app', 'Create Spending');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Spendings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spending-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
