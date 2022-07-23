<?php

namespace app\models\form;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegistrationForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $password_repeat;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'password', 'password_repeat'], 'required'],
            ['password', 'compare'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'password_repeat' => 'Password repeat',
        ];
    }

    /**
     * @return User|null
     */
    public function registration()
    {
        $user = new User();

        if($this->validate()) {
            $user->username = $this->name ;
            $user->email = $this->email;
            $user->generateAuthKey();
            $user->setPassword($this->password);
            $user->created_at = time();
            $user->updated_at = time();

            return $user->save() ? $user : null;
        }
    }
}

