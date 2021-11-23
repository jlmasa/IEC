<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TblMedia]].
 *
 * @see TblMedia
 */
class TblMediaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TblMedia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblMedia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
