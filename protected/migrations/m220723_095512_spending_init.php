<?php

use yii\db\Migration;

/**
 * Class m220723_095512_spending_init
 */
class m220723_095512_spending_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%spending}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'userId' => $this->integer(),
            'price' => $this->float(),
            'datetime' => $this->dateTime(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%spending}}');
    }

}
