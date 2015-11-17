<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\article */
/* @var $form ActiveForm */
?>
<div class="Add">

    <?php $form = ActiveForm::begin(['action'=>['article/doadd'],'method'=>'post'],['options'=>['enctype'=>'multipart/form-data']]); ?>
        <?= $form->field($model, 'content') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'author') ?>
        <?= $form->field($model, 't_id')->radioList(['1'=>'男','0'=>'女']) ?>
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Add -->
