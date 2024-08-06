<?php

use app\models\Cast\CastRole;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\controllers\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            [
                'attribute' => 'role',
                'value' => function ($model) {
                    
                    return (new CastRole)->find($model->role);
                },
            ],
            [
                'attribute' => 'Created',
                'value' => function ($model) {
                    
                    return date('d F,Y',$model->created_at);
                },
            ],
            [
                'attribute' => 'Updated',
                'value' => function ($model) {
                    
                    return date('d F,Y',$model->updated_at);
                },
            ],
            //'auth_key',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
