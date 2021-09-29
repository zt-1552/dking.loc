<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_values}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%values}}`
 */
class m210928_173036_create_junction_table_for_product_and_values_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_values}}', [
            'product_id' => $this->integer(),
            'values_id' => $this->integer(),
            'PRIMARY KEY(product_id, values_id)',
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_values-product_id}}',
            '{{%product_values}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_values-product_id}}',
            '{{%product_values}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `values_id`
        $this->createIndex(
            '{{%idx-product_values-values_id}}',
            '{{%product_values}}',
            'values_id'
        );

        // add foreign key for table `{{%values}}`
        $this->addForeignKey(
            '{{%fk-product_values-values_id}}',
            '{{%product_values}}',
            'values_id',
            '{{%values}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_values-product_id}}',
            '{{%product_values}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_values-product_id}}',
            '{{%product_values}}'
        );

        // drops foreign key for table `{{%values}}`
        $this->dropForeignKey(
            '{{%fk-product_values-values_id}}',
            '{{%product_values}}'
        );

        // drops index for column `values_id`
        $this->dropIndex(
            '{{%idx-product_values-values_id}}',
            '{{%product_values}}'
        );

        $this->dropTable('{{%product_values}}');
    }
}
