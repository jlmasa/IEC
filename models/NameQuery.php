<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Name]].
 *
 * @see Name
 */
class NameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Name[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Name|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
