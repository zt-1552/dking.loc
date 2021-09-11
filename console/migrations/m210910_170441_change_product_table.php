<?php

use yii\db\Migration;

/**
 * Class m210910_170441_change_product_table
 */
class m210910_170441_change_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('product', 'is_offer', $this->tinyInteger());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210910_170441_change_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210910_170441_change_product_table cannot be reverted.\n";

        return false;
    }
    */
}
