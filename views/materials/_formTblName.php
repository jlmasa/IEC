<div class="form-group" id="add-tbl-name">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Role;
use app\models\Name;
use app\models\Position;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'TblName',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'name' => ['type' => TabularForm::INPUT_DROPDOWN_LIST, 
            'items'=>[''=>'Select Name'] + ArrayHelper::map(name::find()->orderBy('name')->asArray()->all(), 'name', 'name'),
                   ],
        'role' => ['type' => TabularForm::INPUT_DROPDOWN_LIST, 
            'items'=>[''=>'Select Role']+ArrayHelper::map(role::find()->all(), 'role', 'role')],
        'position' => ['type' => TabularForm::INPUT_DROPDOWN_LIST, 
            'items'=> [''=>'Select Position']+ArrayHelper::map(position::find()->all(), 'position', 'position')],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowTblName(' . $key . '); return false;', 'id' => 'tbl-name-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Name', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTblName()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

