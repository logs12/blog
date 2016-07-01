<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
	public $layoutPath;

    public $defaultRoute = 'admin';

	/**
	 * В админ панель можно заходить только залогиненным пользователям
	 * @return array
	 */
/*	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			]
		];
	}*/

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setLayoutPath($this->layoutPath);
        $this->layout = 'main';
    }
}
