<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects}}`.
 */
class m240806_061731_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'link' => $this->string()->notNull(),
            'status' => $this->string()->defaultValue('active'),
            'image' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        foreach ([1,2,3,4] as $key => $number) {
            $this->insert('{{%projects}}', [
                'name' => 'Project '.$number,
                'user_id' => 1,
                'link' => 'http://example'.$number.'.com',
                'status' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%projects}}');
    }
}
