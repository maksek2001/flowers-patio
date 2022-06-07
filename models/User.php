<?php

namespace app\models;

use Yii;

/**
 * Администратор
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const SCENARIO_LOGIN = 'login';

    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN => ['username', 'password']
        ];
    }

    public static function tableName()
    {
        return '{{admins}}';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
    }

    public static function findByUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword($password): bool
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function create(): bool
    {
        return $this->save(false);
    }
}
