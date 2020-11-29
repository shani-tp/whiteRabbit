<?php

/**
 * @var yii\web\View $this
 * @var common\models\Fileupload $model
 */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Fileupload',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="fileupload-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
