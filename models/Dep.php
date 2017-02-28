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
class Dep extends \yii\db\ActiveRecord
{

    public function getSubCatList() {

    }

    public function attributeLabels()
    {
        return [
            'id_kat' => 'Kategori',
            'id_buku' => 'Buku',
            'id_user' => 'Nama Anggota',

        ];
    }

}
