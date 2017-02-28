<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerbit".
 *
 * @property integer $id
 * @property string $penerbit
 * @property integer $id_kat
 *
 * @property Kategori $idKat
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerbit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['penerbit'], 'string', 'max' => 255],
            [['penerbit','id_kat'],  'required' ],



            [['id_kat'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kat' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'penerbit' => 'Penerbit',
            'id_kat' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKat()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'id_kat']);
    }
    public function getKategori()
{
    return $this->hasOne(Kategori::className(), ['id' => 'id_kat']);
}

}
