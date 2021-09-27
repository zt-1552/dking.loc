<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%values}}`.
 */
class m210923_170220_create_values_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%values}}', [
            'id' => $this->primaryKey(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%values}}');
    }
}
