<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var frontend\models\FileuploadSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('frontend', 'Fileuploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fileupload-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('frontend', 'Create {modelClass}', [
    'modelClass' => 'Fileupload',
]), ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'extension',
                    'file_path',
                    'file_base_url:url',
                    // 'is_deleted',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
