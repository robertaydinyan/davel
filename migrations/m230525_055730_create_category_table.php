<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m230525_055730_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->insert('category', [
            'name' => 'test 1'
        ]);

        $this->insert('category', [
            'name' => 'test 2'
        ]);

        $this->insert('category', [
            'name' => 'test 3'
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
