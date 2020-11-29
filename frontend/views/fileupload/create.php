<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fileupload */

$this->title = Yii::t('frontend', 'Upload File');
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Fileuploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fileupload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
