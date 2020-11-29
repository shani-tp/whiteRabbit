<?php

/**
 * @var yii\web\View $this
 * @var common\models\Fileupload $model
 */

$this->title = Yii::t('frontend', 'Create {modelClass}', [
    'modelClass' => 'Fileupload',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fileupload-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
