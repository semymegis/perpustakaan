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

    const SCENARIO_CREATE = 'create';
   const SCENARIO_UPDATE= 'update';

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
            [['nama','tahun', 'id_kat', 'photo'], 'required' ,'on' => 'create' ],
            [['nama'], 'unique'],
            [['nama', 'tahun', 'id_kat'], 'required', 'on' => 'create'],
            [['photo'], 'file', 'extensions' => 'png, jpg',  'on' => 'create'],
            [['photo'], 'file', 'extensions' => 'png, jpg',  'on' => 'update'],




        ];
    }

    public function scenarios()
    {
		$scenarios = parent::scenarios();
        $scenarios['create'] = ['nama','tahun','id_kat','photo'];//Scenario Values Only Accepted
        $scenarios['update'] = ['nama','tahun','id_kat','photo'];

        return $scenarios;
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
            'id_kat' => 'Kategori'
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
        public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'id_kat']);
    }


}
