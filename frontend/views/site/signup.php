<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'HRMIS - SignUp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>Please fill out the following fields to signup:</p>



            <?php $form = ActiveForm::begin(['id' => 'form-signup','enableAjaxValidation' => true]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'Employee_No') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'confirmpassword')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>


</div>
