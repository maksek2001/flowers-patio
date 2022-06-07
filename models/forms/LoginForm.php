<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Форма авторизации администратора
 */
class LoginForm extends Model
{
    /** @var string $username */
    public $username;

    /** @var string $password */
    public $password;

    /** @var bool $_admin*/
    private $_admin = false;

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль'
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Обязательное поле!'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $admin = $this->getAdmin();

            if (!$admin || !$admin->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный логин или пароль');
            }
        }
    }

    /**
     * Авторизация
     * @return bool
     */
    public function login(): bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getAdmin(), 0);
        }
        return false;
    }

    /**
     * Получение пользователя по его имени
     */
    public function getAdmin(): ?User
    {
        if ($this->_admin === false) {
            $this->_admin = User::findByUsername($this->username);
            if ($this->_admin) {
                $this->_admin->scenario = User::SCENARIO_LOGIN;
            }
        }

        return $this->_admin;
    }
}
