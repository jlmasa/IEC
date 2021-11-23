<?php

namespace app\models;

use Yii;
use \app\models\base\Name as BaseName;

/**
 * This is the model class for table "name".
 */
class Name extends BaseName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
        ]);
    }
	
}
