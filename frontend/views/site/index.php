<?php
/**
 * @var yii\web\View $this
 */
$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="container">
        <?php echo \common\widgets\DbCarousel::widget([
            'key' => 'index',
            'assetManager' => Yii::$app->getAssetManager(),
            'options' => [
                'class' => 'slide', // enables slide effect
            ],
        ]) ?>
    </div>
</div>
