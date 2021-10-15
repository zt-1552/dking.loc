<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_item}}`.
 */
class m211012_085218_create_orders_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders_item}}', [
            'id' => $this->primaryKey(),
            'orders_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'product_name' => $this->string(255)->notNull(),
            'price' => $this->string(50)->notNull()->defaultValue(0),
            'quantity' => $this->string(100)->unsigned()->notNull(),
            'comment' => $this->string(100)->defaultValue('<Без комментария'),
            'summa' => $this->integer()->unsigned(),

        ]);

        $this->addForeignKey(
            'fk-orders_item-orders_id',
            'orders_item',
            'orders_id',
            'orders',
            'id'
        );

        $this->addForeignKey(
            'fk-orders_item-product_id',
            'orders_item',
            'product_id',
            'product',
            'id'
        );
    }


//`name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Наименование товара',
//`price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Цена товара',
//`quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Количество в заказе',
//`cost` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Стоимость = Цена * Кол-во'


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders_item}}');
    }
}
