<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%item}}`.
 */
class m230525_062150_create_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%item}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'category_id' => $this->integer(),
            'price' => $this->integer(),
            'location_id' => $this->integer(),
            'seller_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk-item-category_id',
            'item',
            'category_id',
            'category',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-item-location_id',
            'item',
            'location_id',
            'location',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-item-seller_id',
            'item',
            'seller_id',
            'seller',
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->insert('item', [
            'name' => 'apple',
            'image' => 'item.jpg',
            'category_id' => 1,
            'price' => 100,
            'location_id' => 3,
            'seller_id' => 1
        ]);

        $this->insert('item', [
            'name' => 'banana',
            'image' => 'item.jpg',
            'category_id' => 2,
            'price' => 50,
            'location_id' => 1,
            'seller_id' => 3
        ]);

        $this->insert('item', [
            'name' => 'Grape',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 600,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'Cherry',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 800,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'Avocado',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 1000,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 1
        ]);

        $this->insert('item', [
            'name' => 'orange1',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange2',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange3',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange4',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange5',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange6',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange7',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange8',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);

        $this->insert('item', [
            'name' => 'orange9',
            'image' => 'item.jpg',
            'category_id' => 3,
            'price' => 500,
            'location_id' => 2,
            'seller_id' => 2
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-item-category_id', 'item');
        $this->dropForeignKey('fk-item-location_id', 'item');
        $this->dropForeignKey('fk-item-seller_id', 'item');
        $this->dropTable('{{%item}}');
    }
}
