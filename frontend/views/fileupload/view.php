<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fileupload */

$this->title = $model->file_path;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fileupload-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('frontend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('frontend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'file_path',
        ],
    ]) ?>

</div>
