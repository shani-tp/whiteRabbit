<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Fileupload $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="fileupload-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'extension')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'file_path')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'file_base_url')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'is_deleted')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('frontend', 'Create') : Yii::t('frontend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
