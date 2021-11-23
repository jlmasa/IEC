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
            <h2><?= ''.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
    
<?php 
            
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        //'category',
           
        [
        'attribute' => 'logo',
        'label' => '',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img(Yii::getAlias('@web').'/'. $data['logo'],
                ['width' => '300px']);
        	},
    	], 
        'title',
        'year',
        'volume',
    
      
        
             
             
             
    		];
        
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerTblMedia->totalCount){
    $gridColumnTblMedia = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'file_name',
            'file_type',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTblMedia,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tbl-media']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Tbl Media'),
        ],
        'columns' => $gridColumnTblMedia
    ]);
}
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tbl-name']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Name'),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tbl-tags']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Tags'),
        ],
        'columns' => $gridColumnTblTags
    ]);
}
?>

    </div>
</div>
