<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "tbl_media".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $file_name
 * @property string $file_type
 *
 * @property \app\models\TblCategory $category
 */
class TblMedia extends \yii\db\ActiveRecord
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
            [['id', 'category_id', 'file_name', 'file_type'], 'required'],
            [['id', 'category_id'], 'integer'],
            [['file_name'], 'string', 'max' => 255],
            [['file_type'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_media';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'file_name' => 'File Name',
            'file_type' => 'File Type',
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
     * @return \app\models\TblMediaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TblMediaQuery(get_called_class());
    }
}
