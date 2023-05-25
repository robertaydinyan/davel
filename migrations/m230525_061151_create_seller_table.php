<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seller}}`.
 */
class m230525_061151_create_seller_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%seller}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'rate' => $this->double()->check('rate >= 0 AND rate <= 5')
        ]);

        $this->insert('seller', [
            'name' => 'seller 1',
            'rate' => 2.2
        ]);

        $this->insert('seller', [
            'name' => 'seller 2',
            'rate' => 3.8
        ]);

        $this->insert('seller', [
            'name' => 'seller 3',
            'rate' => 4.8
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%seller}}');
    }
}
