<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TblName]].
 *
 * @see TblName
 */
class TblNameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TblName[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblName|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
