<?php

use yii\db\Migration;

/**
 * Class m180223_051637_alert_weixin_public_domain
 */
class m180223_051637_alert_weixin_public_domain extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('weixin_public_domain', 'closed_at', 'INT(11) NOT NULL DEFAULT 0');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180223_051637_alert_weixin_public_domain cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180223_051637_alert_weixin_public_domain cannot be reverted.\n";

        return false;
    }
    */
}
