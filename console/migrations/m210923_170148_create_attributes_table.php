<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attributes}}`.
 */
class m210923_170148_create_attributes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attributes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(80),
            'slug' => $this->string(80),
            'type' => $this->string(45)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attributes}}');
    }
}
