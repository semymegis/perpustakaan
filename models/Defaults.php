<?php

namespace app\models;

use Yii;

class Defaults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */



    public static function tableName()
    {
        return 'buku';
    }

    // public function behaviors()
    // {
    //     return [
    //         [
    //             'class' => SluggableBehavior::className(),
    //             'attribute' => 'message',
    //             // 'slugAttribute' => 'slug',
    //         ],
    //     ];
    // }

    /**
     * @inheritdoc
     */
    // public function rules()
    // {
    //     return [
    //         [['imdb_url'], 'string', 'max' => 155],
    //         [['slug', 'name'], 'string', 'max' => 255],
    //     ];
    // }

    /**
     * @inheritdoc
     */
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //         'imdb_url' => 'Imdb Url',
    //         'slug' => 'Slug',
    //         'name' => 'Name',
    //     ];
    // }




}
