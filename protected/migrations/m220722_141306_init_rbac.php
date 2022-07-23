<?php

use yii\db\Migration;

/**
 * Class m220615_141306_init_rbac
 */
class m220722_141306_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $am = Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $admin->description = 'Admin';
        $am->add($admin);


        $user = $am->createRole('user');
        $user->description = 'User';
        $am->add($user);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
