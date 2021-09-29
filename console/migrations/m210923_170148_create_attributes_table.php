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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

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
