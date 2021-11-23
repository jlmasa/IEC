<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "tbl_tags".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $tags
 *
 * @property \app\models\TblCategory $category
 */
class TblTags extends \yii\db\ActiveRecord
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
            [['category_id', 'tags'], 'required'],
            [['category_id'], 'integer'],
            [['tags'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tags';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'tags' => 'Tags',
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
     * @return \app\models\TblTagsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TblTagsQuery(get_called_class());
    }
}
