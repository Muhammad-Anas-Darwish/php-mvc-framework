<?php

namespace app\models;

use silvercodes\phpmvc\Model;
use silvercodes\phpmvc\Application;
use app\models\User;

class LoginForm extends Model  {
    public string $email = '';
    public string $password = '';
    public function rules(): array {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    
    public function labels(): array {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }

    public function login() {
        // $user = User::findOne(['email' => $this->email]);
        $user = new User();
        $user = $user->findOne(['email' => $this->email]);
        
        if (!$user) {
            $this->addError('email', 'User odes not exist with this email');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        
        return Application::$app->login($user);
    }
}