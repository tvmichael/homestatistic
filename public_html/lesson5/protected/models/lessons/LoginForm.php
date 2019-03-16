<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 20.01.2019
 * Time: 20:10
 */

namespace app\models\lessons;

use \yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'length' => [3,10]]
        ];
    }
}