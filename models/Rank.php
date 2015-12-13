<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rank".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $data
 * @property integer $id_aposta
 * @property integer $id_ponto
 *
 * @property User $idUser
 * @property Aposta $idAposta
 * @property Pontos $idPonto
 */
class Rank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'data', 'id_aposta', 'id_ponto'], 'required'],
            [['id_user', 'id_aposta', 'id_ponto'], 'integer'],
            [['data'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_aposta'], 'exist', 'skipOnError' => true, 'targetClass' => Aposta::className(), 'targetAttribute' => ['id_aposta' => 'id']],
            [['id_ponto'], 'exist', 'skipOnError' => true, 'targetClass' => Pontos::className(), 'targetAttribute' => ['id_ponto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'data' => 'Data',
            'id_aposta' => 'Id Aposta',
            'id_ponto' => 'Id Ponto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAposta()
    {
        return $this->hasOne(Aposta::className(), ['id' => 'id_aposta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPonto()
    {
        return $this->hasOne(Pontos::className(), ['id' => 'id_ponto']);
    }
}
