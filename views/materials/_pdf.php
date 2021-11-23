<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Materials */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materials-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Materials'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'category',
        'title',
        'year',
         ['attribute' => 'logo','format' => 'image' ,'label' => 'Image'],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    

    
    <div class="row">
<?php
if($providerTblName->totalCount){
    $gridColumnTblName = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'name',
        'role',
        'position',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTblName,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Tbl Name'),
        ],
        'panelHeadingTemplate' => '<h4>Names</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnTblName
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerTblTags->totalCount){
    $gridColumnTblTags = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'tags',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTblTags,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Tbl Tags'),
        ],
        'panelHeadingTemplate' => '<h4>Tags</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnTblTags
    ]);
}
?>
    </div>
</div>
