<?php

use yii\db\Migration;

/**
 * Class m180223_025310_create_weixin_public_config
 */
class m180223_025310_create_weixin_public_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weixin_public_config', [
            'id' => $this->primaryKey(),
            'name' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'app_id' => 'VARCHAR(32) NOT NULL DEFAULT ""',
            'app_secret' => 'VARCHAR(32) NOT NULL DEFAULT ""',
            'status' => 'TINYINT(1) NOT NULL DEFAULT 0',
            'created_at' => 'INT(11) NOT NULL DEFAULT 0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_025310_create_weixin_public_config cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_025310_create_weixin_public_config cannot be reverted.\n";

        return false;
    }
    */
}
