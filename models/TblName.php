<?php

namespace app\models;

use Yii;
use \app\models\base\TblName as BaseTblName;

/**
 * This is the model class for table "tbl_name".
 */
class TblName extends BaseTblName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['category_id', 'name', 'role'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'role', 'position'], 'string', 'max' => 255]
        ]);
    }
	
}
