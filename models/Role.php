<?php

namespace app\models;

use Yii;
use \app\models\base\Role as BaseRole;

/**
 * This is the model class for table "tbl_role".
 */
class Role extends BaseRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['role'], 'required'],
            [['role'], 'string', 'max' => 100]
        ]);
    }
	
}
