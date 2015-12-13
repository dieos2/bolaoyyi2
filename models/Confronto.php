<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "confronto".
 *
 * @property integer $id
 * @property integer $id_grupo
 * @property integer $id_time_casa
 * @property integer $id_time_visitante
 * @property string $data
 * @property integer $placar_casa
 * @property integer $placar_visitante
 * @property integer $vencedor
 * @property integer $empate
 *
 * @property Aposta[] $apostas
 * @property Grupo $idGrupo
 * @property Time $idTimeCasa
 * @property Time $idTimeVisitante
 * @property Time $vencedor0
 */
class Confronto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'confronto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grupo', 'id_time_casa', 'id_time_visitante', 'data'], 'required'],
            [['id_grupo', 'id_time_casa', 'id_time_visitante', 'placar_casa', 'placar_visitante', 'vencedor', 'empate'], 'integer'],
            [['data'], 'safe'],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupo::className(), 'targetAttribute' => ['id_grupo' => 'id']],
            [['id_time_casa'], 'exist', 'skipOnError' => true, 'targetClass' => Time::className(), 'targetAttribute' => ['id_time_casa' => 'id']],
            [['id_time_visitante'], 'exist', 'skipOnError' => true, 'targetClass' => Time::className(), 'targetAttribute' => ['id_time_visitante' => 'id']],
            [['vencedor'], 'exist', 'skipOnError' => true, 'targetClass' => Time::className(), 'targetAttribute' => ['vencedor' => 'id']],
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
            'id_time_casa' => 'Id Time Casa',
            'id_time_visitante' => 'Id Time Visitante',
            'data' => 'Data',
            'placar_casa' => 'Placar Casa',
            'placar_visitante' => 'Placar Visitante',
            'vencedor' => 'Vencedor',
            'empate' => 'Empate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApostas()
    {
        return $this->hasMany(Aposta::className(), ['id_confronto' => 'id']);
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
    public function getIdTimeCasa()
    {
        return $this->hasOne(Time::className(), ['id' => 'id_time_casa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTimeVisitante()
    {
        return $this->hasOne(Time::className(), ['id' => 'id_time_visitante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVencedor0()
    {
        return $this->hasOne(Time::className(), ['id' => 'vencedor']);
    }
}
