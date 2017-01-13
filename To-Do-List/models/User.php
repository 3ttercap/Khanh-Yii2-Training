<?php
/**
 * Created by PhpStorm.
 * User: KahnTran
 * Date: 1/9/2017
 * Time: 4:04 PM
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 */


class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName() {
        return 'user';
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'password',
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param int|string $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id' => $id]);
    }

    /**
     * Finds an identity by the given token
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail($email) {
        return static::findOne(['email' => $email]);
    }
}
?>

<?php
//
//namespace app\models;
//
//class User extends \yii\base\Object implements \yii\web\IdentityInterface
//{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//
//    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];
//
//
//    /**
//     * @inheritdoc
//     */
//    public static function findIdentity($id)
//    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public static function findIdentityByAccessToken($token, $type = null)
//    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * Finds user by username
//     *
//     * @param string $username
//     * @return static|null
//     */
//    public static function findByUsername($username)
//    {
//        foreach (self::$users as $user) {
//            if (strcasecmp($user['username'], $username) === 0) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function getAuthKey()
//    {
//        return $this->authKey;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function validateAuthKey($authKey)
//    {
//        return $this->authKey === $authKey;
//    }
//
//    /**
//     * Validates password
//     *
//     * @param string $password password to validate
//     * @return bool if password provided is valid for current user
//     */
//    public function validatePassword($password)
//    {
//        return $this->password === $password;
//    }
//}
