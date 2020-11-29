<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\Fileupload $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fileupload-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(Yii::t('frontend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('frontend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('frontend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'extension',
                    'file_path',
                    'file_base_url:url',
                    'is_deleted',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
