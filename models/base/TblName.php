<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "tbl_name".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $role
 * @property string $position
 *
 * @property \app\models\TblCategory $category
 */
class TblName extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'category'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'role'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'role', 'position'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_name';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'role' => 'Role',
            'position' => 'Position',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\app\models\TblCategory::className(), ['id' => 'category_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
/*
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }
*/

    /**
     * @inheritdoc
     * @return \app\models\TblNameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TblNameQuery(get_called_class());
    }
}
