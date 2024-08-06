<?php

use app\models\Cast\CastStatus;
use app\models\Projects;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\controllers\ProjectsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Projects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return User::findOne($model->user_id)->name;
                },
            ],
            'name',
            'link',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return (new CastStatus)->find($model->status);
                },
            ],
            [
                'attribute' => 'created',
                'value' => function ($model) {
                    return date('d F, Y',$model->created_at);
                },
            ],
            [
                'attribute' => 'updated',
                'value' => function ($model) {
                    return date('d F, Y',$model->updated_at);
                },
            ],
            //'image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Projects $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
