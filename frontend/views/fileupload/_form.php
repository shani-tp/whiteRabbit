<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Fileupload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fileupload-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    <?=  $form->field($model, 'upload_file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
                'allowedFileExtensions'=>['jpg', 'gif', 'png', 'pdf', 'jpeg', 'doc', 'docx', 'txt'],
                'showUpload' => true,
                'overwriteInitial' => false,
            ],
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend', 'Upload'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
