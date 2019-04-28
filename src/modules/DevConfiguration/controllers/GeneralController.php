<?php

namespace thienhungho\DevConfiguration\modules\DevConfiguration\controllers;

use thienhungho\DevConfiguration\modules\DevConfiguration\GeneralForm;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Default controller for the `SiteConfiguration` module
 */
class GeneralController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new GeneralForm();
        if ($model->load(\request()->post())) {
            if ($model->config()) {
                set_flash('success_change_configuration', $array = [
                    'type'     => 'success',
                    'duration' => 3000,
                    'icon'     => 'glyphicon glyphicon-ok-sign',
                    'title'    => \Yii::t('app', 'Congratulations!'),
                    'message'  => \Yii::t('app','Your setups has been saved'),
                ]);
                return $this->redirect(Url::to(['index']));
            } else {
                set_flash('error_change_configuration', $array = [
                    'type'     => 'danger',
                    'duration' => 3000,
                    'icon'     => 'glyphicon glyphicon-remove-sign',
                    'title'    => \Yii::t('app', 'An error has occurred!'),
                    'message'  => \Yii::t('app','Your setups has not been saved'),
                ]);
                return $this->render('index', ['model' => $model]);
            }
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }
}
