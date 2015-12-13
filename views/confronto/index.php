<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Confrontos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="confronto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Confronto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_grupo',
            'id_time_casa:datetime',
            'id_time_visitante:datetime',
            'data',
            // 'placar_casa',
            // 'placar_visitante',
            // 'vencedor',
            // 'empate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
