<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FileuploadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fileupload-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'file_path') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('frontend', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
