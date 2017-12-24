<?php

use yii\db\Migration;

/**
 * Class m171220_190908_add_user
 */
class m171220_190908_add_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'password_hash' => $this->string()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'is_admin' => $this->boolean()->notNull()->defaultValue(false),
            'password_reset_token' => $this->string()->unique(),
            'auth_key' =>$this->string(),



        ]);
        $this->addForeignKey('employee_fk', 'user', 'username', 'employee', 'employee_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }


}
