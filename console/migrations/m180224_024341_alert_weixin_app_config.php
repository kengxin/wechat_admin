<?php

use yii\db\Migration;

/**
 * Class m180224_024341_alert_weixin_app_config
 */
class m180224_024341_alert_weixin_app_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('weixin_app_config', 'share_desc', 'VARCHAR(255) NOT NULL DEFAULT ""');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180224_024341_alert_weixin_app_config cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180224_024341_alert_weixin_app_config cannot be reverted.\n";

        return false;
    }
    */
}
