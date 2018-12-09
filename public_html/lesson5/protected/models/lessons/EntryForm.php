<?php
namespace app\models\lessons;

use yii\base\Model;

class EntryForm extends Model
{
    public $email;
    public $login;
    public $password;

    public $name;
    public $surname;
    public $date;

    public function rules()
    {
        return [
            [['login', 'email', 'password'], 'required'],
            ['email', 'email'],
            [['name', 'surname', 'date'], 'string'],
        ];
    }

}