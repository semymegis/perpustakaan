<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property integer $id_buku
 * @property string $nama
 * @property string $tahun
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 255],
            [['tahun'], 'string', 'max' => 55],
            [['nama','tahun'], 'required'],
            [['photo'], 'file', 'extensions' => ['png','jpg','gif'], 'maxSize' => 1024*1024],



        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_buku' => 'Id Buku',
            'nama' => 'Nama',
            'tahun' => 'Tahun',
            'photo' => 'Photo',
        ];
    }

    /**
     * @inheritdoc
     * @return BukuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BukuQuery(get_called_class());
    }
}
