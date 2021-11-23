<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "tbl_category".
 *
 * @property integer $id
 * @property string $category
 * @property string $title
 * @property integer $year
 * @property string $logo
 *
 * @property \app\models\TblMedia[] $tblMedia
 * @property \app\models\TblName[] $tblNames
 * @property \app\models\TblTags[] $tblTags
 */
class Materials extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'tblMedia',
            'tblNames',
            'tblTags'
        ];
    }

    /**
     * @inheritdoc
     */
	public function getTags(){
		
		return $this->hasOne(TblTags::className(), ['category_id' => 'id']);
	
	}

    public function rules()
    {
        return [
            [['category', 'title', 'year'], 'required'],
            [['year'], 'integer'],
            [['category'], 'string', 'max' => 100],
        	[['volume'], 'string', 'max' => 100],
            [['title', 'logo','id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'title' => 'Title',
            'year' => 'Year',
            'logo' => 'Logo',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMedia()
    {
        return $this->hasMany(\app\models\TblMedia::className(), ['category_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNames()
    {
        return $this->hasMany(\app\models\TblName::className(), ['category_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTags()
    {
        return $this->hasMany(\app\models\TblTags::className(), ['category_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
 /**   public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\MaterialsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MaterialsQuery(get_called_class());
    }
}
