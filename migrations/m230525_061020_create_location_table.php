<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%location}}`.
 */
class m230525_061020_create_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->insert('location', [
            'name' => 'location 1'
        ]);

        $this->insert('location', [
            'name' => 'location 2'
        ]);

        $this->insert('location', [
            'name' => 'location 3'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%location}}');
    }
}
