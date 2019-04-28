<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

$this->title = Yii::t('app', 'Dev Configuration') . ' - ' . Yii::t('app', 'General');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dev Configuration'), 'url' => ['/dev-configuration']];
$this->params['breadcrumbs'][] = Yii::t('app', 'General');

$settings = Yii::$app->settings;

if (empty($model->debug_status)) {
    $model->debug_status = $settings->get('dev_configuration', 'debug_status', \thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEBUG_STATUS_FALSE);
}

if (empty($model->dev_mode_status)) {
    $model->dev_mode_status = $settings->get('dev_configuration', 'dev_mode_status', \thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEV_MODE_STATUS_FALSE);
}

?>

<?php $form = ActiveForm::begin(['id' => 'seo-general-form']); ?>

<?= $form->field($model, 'debug_status', [
    'addon' => ['prepend' => ['content' => '<span class="fa fa-stethoscope"></span>']],
])->radioButtonGroup([\thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEBUG_STATUS_FALSE => Yii::t('app', 'False'), \thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEBUG_STATUS_TRUE => Yii::t('app', 'True')], [
    'class' => 'btn-group-sm',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
]); ?>

<?= $form->field($model, 'dev_mode_status', [
    'addon' => ['prepend' => ['content' => '<span class="fa fa-code"></span>']],
])->radioButtonGroup([\thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEV_MODE_STATUS_FALSE => Yii::t('app', 'False'), \thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm::DEV_MODE_STATUS_TRUE => Yii::t('app', 'True')], [
    'class' => 'btn-group-sm',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default']]
]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn green', 'name' => 'save-button']) ?>
    </div>

<?php ActiveForm::end(); ?>