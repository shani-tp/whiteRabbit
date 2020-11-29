<?php

use yii\db\Migration;

/**
 * Class m201129_093530_fileupload
 */
class m201129_093530_fileupload extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fileupload}}', [
            'id' => $this->primaryKey(),
            'file_path' => $this->string(),
            'name' => $this->string(1024),
            'is_deleted' => $this->smallInteger()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fileupload}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201129_093530_fileupload cannot be reverted.\n";

        return false;
    }
    */
}
