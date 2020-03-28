<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%volunteer}}`.
 */
class m200328_203858_create_volunteer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%volunteer}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'city' => $this->string(),
            'facebook_profile_url' => $this->string(),
            'avatar_url' => $this->string(),
            'age' => $this->string(),
            'sex' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%volunteer}}');
    }
}
