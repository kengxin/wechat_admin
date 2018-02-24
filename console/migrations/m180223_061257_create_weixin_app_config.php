<?php

use yii\db\Migration;

/**
 * Class m180223_061257_create_weixin_app_config
 */
class m180223_061257_create_weixin_app_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weixin_app_config', [
            'id' => $this->primaryKey(),
            'share_title' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'share_thumb' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'ad_title' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'ad_thumb' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'ad_url' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'created_at' => 'INT(11) NOT NULL DEFAULT 0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_061257_create_weixin_app_config cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_061257_create_weixin_app_config cannot be reverted.\n";

        return false;
    }
    */
}
