<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m211012_084932_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(50)->notNull(),
            'address' => $this->string(100)->notNull(),
            'comment' => $this->string(100)->defaultValue('Без комментария'),
            'summa' => $this->integer(),
            'status' => $this->tinyInteger()->defaultValue(0),
            'created_at' => $this->date()->defaultValue(null),
            'updated_at' => $this->date()->defaultValue(null),

        ]);
        $this->addForeignKey(
            'fk-orders-user_id',
            'orders',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
