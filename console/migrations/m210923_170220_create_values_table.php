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
            'attributes_id' => $this->integer()->notNull(),
            'value' => $this->string(100)->notNull(),
            'slug' => $this->string(100),
        ]);

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-values-attributes_id',
            'values',
            'attributes_id',
            'attributes',
            'id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%values}}');
    }
}
