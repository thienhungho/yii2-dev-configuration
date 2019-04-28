<?php

namespace thienhungho\DevConfiguration\modules\DevConfiguration;

use common\modules\uploads\Uploads;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class GeneralForm extends Model
{
    const DEBUG_STATUS_TRUE = 'true';
    const DEBUG_STATUS_FALSE = 'false';
    const DEV_MODE_STATUS_TRUE = 'true';
    const DEV_MODE_STATUS_FALSE = 'false';

    public $debug_status;
    public $dev_mode_status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'debug_status',
                    'dev_mode_status',
                ],
                'required',
            ],
            [
                [
                    'debug_status',
                    'dev_mode_status',
                ],
                'string',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'debug_status' => Yii::t('app', 'Debug Status'),
            'dev_mode_status' => Yii::t('app', 'Dev Mode Status'),
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function config()
    {
        if ($this->validate()) {
            $this->configDebugStatus();
            $this->configDevModeStatus();

            return true;
        }

        return false;
    }

    /**
     * Config Debug Status
     */
    private function configDebugStatus()
    {
        $debugStatus = $this->debug_status;
        $settings = Yii::$app->settings;
        $settings->set('dev_configuration', 'debug_status', $debugStatus);
        if ($debugStatus == self::DEBUG_STATUS_TRUE) {
            $content = <<<PHP
<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
PHP;
        } elseif ($debugStatus == self::DEBUG_STATUS_FALSE) {
            $content = <<<PHP
<?php

defined('YII_DEBUG') or define('YII_DEBUG', false);
PHP;
        }
        file_put_contents(Yii::getAlias('@backend') . '/../../_debug.php', $content);
    }

    /**
     * Config Debug Status
     */
    private function configDevModeStatus()
    {
        $devModeStatus = $this->dev_mode_status;
        $settings = Yii::$app->settings;
        $settings->set('dev_configuration', 'dev_mode_status', $devModeStatus);
        if ($devModeStatus == self::DEV_MODE_STATUS_TRUE) {
            $content = <<<PHP
<?php

defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);
PHP;
        } elseif ($devModeStatus == self::DEV_MODE_STATUS_FALSE) {
            $content = <<<PHP
<?php

defined('YII_ENV') or define('YII_ENV', 'prod');
defined('YII_ENV_DEV') or define('YII_ENV_DEV', false);
PHP;
        }
        file_put_contents(Yii::getAlias('@backend') . '/../../_dev.php', $content);
    }

}
