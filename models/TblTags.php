<?php

namespace app\models;

use Yii;
use \app\models\base\TblTags as BaseTblTags;

/**
 * This is the model class for table "tbl_tags".
 */
class TblTags extends BaseTblTags
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['category_id', 'tags'], 'required'],
            [['category_id'], 'integer'],
            [['tags'], 'string', 'max' => 255]
        ]);
    }
	
}
