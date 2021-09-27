<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210907_173645_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'meta_title' => $this->string()->notNull(),
            'meta_description' => $this->text(),
            'content' => $this->text(),
            'short_content' => $this->text(),
            'image' => $this->string()->defaultValue(null),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->date()->defaultValue(null),
            'updated_at' => $this->date()->defaultValue(null),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
