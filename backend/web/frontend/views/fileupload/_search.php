<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\Fileupload $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="fileupload-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'name') ?>
    <?php echo $form->field($model, 'extension') ?>
    <?php echo $form->field($model, 'file_path') ?>
    <?php echo $form->field($model, 'file_base_url') ?>
    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('frontend', 'Reset'), ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
