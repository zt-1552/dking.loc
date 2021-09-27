<?php

use yii\db\Migration;

/**
 * Class m210927_064438_change_product_table
 */
class m210927_064438_change_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'bestsellers', 'integer DEFAULT 0');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210927_064438_change_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210927_064438_change_product_table cannot be reverted.\n";

        return false;
    }
    */
}
