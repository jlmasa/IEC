<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use kartik\file\FileInput;

$Category=Category::find()->all();
$listData=ArrayHelper::map($Category,'category_name','category_name');
/* @var $this yii\web\View */
/* @var $model app\models\Materials */
/* @var $form yii\widgets\ActiveForm */


\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'TblName', 
        'relID' => 'tbl-name', 
        'value' => \yii\helpers\Json::encode($model->tblNames),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'TblTags', 
        'relID' => 'tbl-tags', 
        'value' => \yii\helpers\Json::encode($model->tblTags),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="materials-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

   <?= $form->field($model, 'category')->dropDownList(
        $listData,
        ['prompt'=>'Select Category']
        ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'year')->textInput(['placeholder' => 'Year']) ?>

	<?= $form->field($model, 'volume')->textInput(['placeholder' => 'Volume']) ?>

	<!--?= $form->field($model, 'file' )->fileInput(); ?-->	

	<?= $form->field($model, 'file' )->fileInput(); ?>

	<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        ['attribute' => 'logo','label' => 'Photo'],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>

    <?php
    $forms = [
      
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Name'),
            'content' => $this->render('_formTblName', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->tblNames),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Tags'),
            'content' => $this->render('_formTblTags', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->tblTags),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
