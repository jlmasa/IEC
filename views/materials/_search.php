<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tags;
/* @var $this yii\web\View */
/* @var $model app\models\MaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-materials-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Category']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

	 <?= $form->field($model, 'volume')->textInput(['maxlength' => true, 'placeholder' => 'Volume']) ?>

	<?= $form->field($model, 'id')->textInput(['maxlength' => true, 'placeholder' => 'Search Keyword']) ?>

    <?= $form->field($model, 'year')->textInput(['placeholder' => 'Year']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
