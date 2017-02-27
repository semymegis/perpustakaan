<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pinjaman".
 *
 * @property string $tgl
 * @property integer $id_buku
 * @property integer $id_user
 *
 * @property Buku $idBuku
 * @property Kategori $idKat
 */
class Pinjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pinjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl'], 'safe'],
            [['id_buku', 'id_user'], 'required'],
            [['id_buku', 'id_user'], 'integer'],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::className(), 'targetAttribute' => ['id_buku' => 'id_buku']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id_user']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tgl' => 'Tgl',
            'id_buku' => 'Judul Buku',
            'id_user' => 'Id Peminjam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBuku()
    {
        return $this->hasOne(Buku::className(), ['id_buku' => 'id_buku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKat()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'id_user']);
    }

    

}
