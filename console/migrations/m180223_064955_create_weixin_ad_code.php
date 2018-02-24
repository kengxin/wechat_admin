<?php

use yii\db\Migration;

/**
 * Class m180223_064955_create_weixin_ad_code
 */
class m180223_064955_create_weixin_ad_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weixin_ad_code', [
            'id' => $this->primaryKey(),
            'code' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'code_url' => 'VARCHAR(255) NOT NULL DEFAULT ""',
            'show_sum' => 'INT(11) NOT NULL DEFAULT 0',
            'status' => 'TINYINT(1) NOT NULL DEFAULT 0',
            'created_at' => 'INT(11) NOT NULL DEFAULT 0'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_064955_create_weixin_ad_code cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_064955_create_weixin_ad_code cannot be reverted.\n";

        return false;
    }
    */
}
