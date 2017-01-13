<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Note */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="note-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'due_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::classname(), [
        // if using Bootstrap, the following will set the correct style of the input field
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        // more DatePicker properties configuration here
    ]) ?>

<!--    --><?//= $form->field($model, 'created_at')->widget(DatePicker::className(), [
//            'options' => ['class' => 'form-control'],
//    ]) ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'modified_at')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
