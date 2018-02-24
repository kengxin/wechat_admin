<?php

use yii\db\Migration;

/**
 * Class m180223_025316_create_weixin_public_domain
 */
class m180223_025316_create_weixin_public_domain extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weixin_public_domain', [
            'id' => $this->primaryKey(),
            'domain' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'type' => 'TINYINT(1) NOT NULL DEFAULT 0',
            'status' => 'TINYINT(1) NOT NULL DEFAULT 0',
            'public_id' => 'INT(11) NOT NULL DEFAULT 0',
            'closed_at' => 'INT(11) NOT NULL DEFAULT 0',
            'created_at' => 'INT(11) NOT NULL DEFAULT 0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_025316_create_weixin_public_domain cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_025316_create_weixin_public_domain cannot be reverted.\n";

        return false;
    }
    */
}
