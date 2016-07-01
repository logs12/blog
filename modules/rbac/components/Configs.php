<?php

namespace app\modules\rbac\components;

use Yii;
use yii\base\Object;
use yii\db\Connection;
use yii\di\Instance;
use yii\helpers\ArrayHelper;

class Configs extends Object
{
    public $db = 'db';

    public $cache = 'cache';

    public $userTable = '{{%user}}';

    private static $_instance;
    private static $_classes = [
        'db' => 'yii\db\Connection',
        'cache' => 'yii\caching\Cache'
    ];

    /**
     * Connect the dependent classes
     */
    public function init()
    {
        foreach (self::$_classes as $key=>$class) {
            try {
                if (empty($this->$key))
                    $this->$key = null;
                else
                    $this->$key = Instance::ensure($this->$key, $class);
            } catch (\Exception $exc) {
                $this->$key = null;
                Yii::error($exc->getMessage());
            }
        }
    }
    
    public static function instance()
    {
        if (self::$_instance === null) {
            $type = ArrayHelper::getValue(Yii::$app->params, 'rbac.configs',[]);
            if (is_array($type) && !isset($type['class'])) {
                $type['class'] = static::className();
            }
            return self::$_instance = Yii::createObject($type);
        }
        return self::$_instance;
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = static::instance();
        if ($instance->hasProperty($name))
            return $instance->$name;
        else {
            if (count($arguments)) {
                $instance->options[$name] = reset($arguments);
            } else {
                return array_key_exists($name, $instance->options) ? $instance->options[$name] : null;
            }
        }
    }

    /**
     * @return Connection
     */
    public static function db()
    {
        return static::instance()->db;
    }

    /**
     * @return integer
     */
    public static function cacheDuration()
    {
        return static::instance()->cacheDuration;
    }

    /**
     * @return string
     */
    public static function userTable()
    {
        return static::instance()->userTable;
    }
}