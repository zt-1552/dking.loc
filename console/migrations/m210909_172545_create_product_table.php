<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210909_172545_create_product_table extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer()->defaultValue(1),
            'title'=>$this->string()->notNull()->defaultValue('Мобильный телефон Самсунг'),
            'content'=>$this->text(),
            'price'=>$this->integer()->defaultValue(1700),
            'old_price'=>$this->integer()->defaultValue(2100),
            'meta_title'=>$this->string()->notNull()->defaultValue('Купить Тайтл для телефона Самсунг'),
            'meta_description'=>$this->string()->defaultValue('Заказать Дескрипшен Описание для телефона Самсунг'),
            'image'=>$this->string()->defaultValue("\images\product\product-1.jpg"),
            'is_offer'=>$this->tinyInteger()->defaultValue(0),
            'bestsellers'=>$this->integer()->defaultValue(0),
            'created_at'=>$this->integer()->defaultValue(null),
            ]);

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
