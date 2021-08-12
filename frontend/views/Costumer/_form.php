<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Costumer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="costumer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['value' => 
    \Yii::$app->user->identity->id,'readonly'=>'true']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
