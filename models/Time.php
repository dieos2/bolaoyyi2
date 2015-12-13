<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "time".
 *
 * @property integer $id
 * @property string $nome
 * @property string $escudo
 *
 * @property Confronto[] $confrontos
 * @property Confronto[] $confrontos0
 * @property Confronto[] $confrontos1
 * @property GrupoTime[] $grupoTimes
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'escudo'], 'required'],
            [['nome', 'escudo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'escudo' => 'Escudo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfrontos()
    {
        return $this->hasMany(Confronto::className(), ['id_time_casa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfrontos0()
    {
        return $this->hasMany(Confronto::className(), ['id_time_visitante' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfrontos1()
    {
        return $this->hasMany(Confronto::className(), ['vencedor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoTimes()
    {
        return $this->hasMany(GrupoTime::className(), ['id_time' => 'id']);
    }
}
