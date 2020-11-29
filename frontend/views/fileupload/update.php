<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fileupload */

$this->title = Yii::t('frontend', 'Update Fileupload: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="fileupload-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
