<?php

namespace app\models;

use Yii;
use \app\models\base\Materials as BaseMaterials;



/**
 * This is the model class for table "tbl_category".
 */
class Materials extends BaseMaterials
{
    /**
     * @inheritdoc
     */
	public $file;
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['category', 'title', 'year'], 'required'],
            [['year'], 'integer'],
            [['category'], 'string', 'max' => 100],
        	[['volume'], 'string', 'max' => 100],
            [['title', 'logo'], 'string', 'max' => 255],
        	[['file'], 'file','extensions' => 'jpg,png,gif,pdf,docx,xls,pptx,ppt']
        ]);
    }

public function attributeLabels()
{
    return [
      'file' => 'Upload Photo',
      
	  
	  ];
	
}

}
