<?php

use yii\db\Migration;

/**
 * Class m180223_060437_create_weixin_share_log
 */
class m180223_060437_create_weixin_share_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weixin_share_log', [
            'id' => $this->primaryKey(),
            'type' => 'TINYINT(1) NOT NULL DEFAULT 0',
            'url' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'app_id' => 'INT(11) NOT NULL DEFAULT 0',
            'created_at' => 'INT(11) NOT NULL DEFAULT 0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_060437_create_weixin_share_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_060437_create_weixin_share_log cannot be reverted.\n";

        return false;
    }
    */
}
