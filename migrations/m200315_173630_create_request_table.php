<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 * Notes:
 * You can see here, there are no int based columns here, everything is string.
 * That's because this system is not designed to be complex at all.
 * I'm not really planning on adding tables for types or statuses, because it would take
 * much more time to make it work properly, and that is not necessary yet.
 */
class m200315_173630_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'full_name' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'country' => $this->string(),
            'city' => $this->string(),
            'address' => $this->string(),
            'message_1' => $this->text(),
            'message_2' => $this->text(),
            'message_3' => $this->text(),
            'message_4' => $this->text(),
            'status' => $this->string(),
            'access_key' => $this->string(),
            'uid' => $this->string(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
