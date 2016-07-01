<?php

namespace app\modules\rbac\models;

use Yii;
use yii\base\Object;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 */
class Assignment extends Object
{

    /**
     * @var integer User id
     */
    public $id;

    /**
     * @var \yii\web\IdentityInterface;
     */
    public $user;

    /**
     * Assignment constructor.
     * @param array $id
     * @param null $user
     * @param array $config
     */
    public function __construct($id, $user = null, $config = [])
    {
        $this->id = $id;
        $this->user = $user;
        parent::__construct($config);
    }
    
    public function assign($items)
    {
        $manager = Yii::$app->getAuthManager();
        $success = 0;
        /*foreach () {
            
        }*/
    }
    
    
    
    
    
    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }
}
