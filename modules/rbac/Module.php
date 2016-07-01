<?php

namespace app\modules\rbac;

use Yii;
use app\modules\rbac\AutocompleteAsset;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * user module definition class
 */
class Module extends \yii\base\Module
{
    public $layoutPath;
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\rbac\controllers';

/*    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'register'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setLayoutPath($this->layoutPath);
        $this->layout = 'main';
        $this->registerAssets();
        if (!isset(Yii::$app->i18n->translations['rbac'])) {
            Yii::$app->i18n->translations['rbac'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@app/modules/rbac/messages'
            ];
        }
        
    }

    /**
     * Register assets AutocompleteAsset
     */
    public function registerAssets()
    {
        $view = Yii::$app->getView();
        AutocompleteAsset::register($view);
    }
}
