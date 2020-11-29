<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Fileupload;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FileuploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Fileuploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fileupload-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('frontend', 'Upload a File'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'file_path',
            'name',
            [
                'class' => \common\widgets\ActionColumn::class,
                'template' => '{delete}',
                'options' => ['style' => 'width: 140px'],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
