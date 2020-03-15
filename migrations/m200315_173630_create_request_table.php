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
            'type' => $this->string()->comment('this is the request type. e.g.: grocery-request, courier etc...'),
            'full_name' => $this->string()->comment('The name of the person who made the request'),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'email' => $this->string()->comment('The email of the person who made the request'),
            'phone' => $this->string()->comment('The phone number of the person who made the request'),
            'country' => $this->string()->comment('Not necessary. If so, use english country name'),
            'city' => $this->string()->comment('The city the person who made the request lives in'),
            'address' => $this->string(),
            'message_1' => $this->text(),
            'message_2' => $this->text(),
            'message_3' => $this->text(),
            'message_4' => $this->text(),
            'status' => $this->string()->comment('The status of the request'),
            'access_key' => $this->string()->comment('A key for enabling the editing of the requests.'),
            'uid' => $this->string()->comment('UID'),
            'created_at' => $this->string()->comment('When the request was made'),
            'updated_at' => $this->string()->comment('When the request was updated'),
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
