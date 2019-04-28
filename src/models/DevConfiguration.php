<?php
/**
 * Created by PhpStorm.
 * User: hohung
 * Date: 2019-04-28
 * Time: 16:40
 */

namespace thienhungho\DevConfiguration\models;


class DevConfiguration
{
    const DEBUG_STATUS_TRUE = 'true';
    const DEBUG_STATUS_FALSE = 'false';
    const DEV_MODE_STATUS_TRUE = 'true';
    const DEV_MODE_STATUS_FALSE = 'false';

    public static function getDebugStatus() {
        $settings = Yii::$app->settings;
        return $settings->get('dev_configuration', 'debug_status', self::DEBUG_STATUS_FALSE);
    }

    public static function getDevModeStatus() {
        $settings = Yii::$app->settings;
        return $settings->get('dev_configuration', 'dev_mode_status', self::DEBUG_STATUS_FALSE);
    }
}