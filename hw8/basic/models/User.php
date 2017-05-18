<?php
namespace app\models;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
        ];
    }

    /**
     * @param int|string $id
     * @return static
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * @param $name
     * @return static
     */
    public static function findByUsername($name)
    {
        return User::findOne(['name' => $name]);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * @param string $authKey
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * @param mixed $token
     * @param null $type
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * password validator
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return ($this->password === $password) ? true : false;
    }

    /**
     * create user
     * @return bool
     */
    public function create()
    {
        return $this->save(false);
    }

    /**
     * get user name
     * @return string
     */
    public function getUserName()
    {
        return $this->name;
    }
}