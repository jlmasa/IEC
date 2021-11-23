<?php

namespace app\models;

use Yii;
use \app\models\base\TblMedia as BaseTblMedia;

/**
 * This is the model class for table "tbl_media".
 */
class TblMedia extends BaseTblMedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'category_id', 'file_name', 'file_type'], 'required'],
            [['id', 'category_id'], 'integer'],
            [['file_name'], 'string', 'max' => 255],
            [['file_type'], 'string', 'max' => 100]
        ]);
    }
	
}
