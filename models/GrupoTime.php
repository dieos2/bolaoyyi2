<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_time".
 *
 * @property integer $id
 * @property integer $id_grupo
 * @property integer $id_time
 *
 * @property Grupo $idGrupo
 * @property Time $idTime
 */
class GrupoTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grupo', 'id_time'], 'required'],
            [['id_grupo', 'id_time'], 'integer'],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['id_grupo' => 'id']],
            [['id_time'], 'exist', 'skipOnError' => true, 'targetClass' => Time::className(), 'targetAttribute' => ['id_time' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_grupo' => 'Id Grupo',
            'id_time' => 'Id Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTime()
    {
        return $this->hasOne(Time::className(), ['id' => 'id_time']);
    }
}
