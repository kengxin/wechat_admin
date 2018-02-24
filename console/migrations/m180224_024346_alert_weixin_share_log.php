<?php

use yii\db\Migration;

/**
 * Class m180224_024346_alert_weixin_share_log
 */
class m180224_024346_alert_weixin_share_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('weixin_share_log', 'msg', 'VARCHAR(255) NOT NULL DEFAULT ""');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180224_024346_alert_weixin_share_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180224_024346_alert_weixin_share_log cannot be reverted.\n";

        return false;
    }
    */
}
