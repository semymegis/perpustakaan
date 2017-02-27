<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Buku[] $bukus
 * @property Pinjaman[] $pinjamen
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 255],
            [['id'], 'integer', 'max' => 255],
            [['nama'], 'unique'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kat' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBukus()
    {
        return $this->hasMany(Buku::className(), ['id_kat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPinjamen()
    {
        return $this->hasMany(Pinjaman::className(), ['id_kat' => 'id']);
    }



}
