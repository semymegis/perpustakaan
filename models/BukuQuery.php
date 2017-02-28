<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Buku]].
 *
 * @see Buku
 */
class BukuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Buku[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Buku|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
