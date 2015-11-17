<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(),[
            'template'=>"{image}",
            'imageOptions'=>['alt'=>'验证码'],
            'captchaAction'=>'site/captcha',
        ]);?>

    <?php ActiveForm::end(); ?>
