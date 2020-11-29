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
            'name' => $this->string(),
            'extension' => $this->string(),
            'file_path' => $this->string(),
            'file_base_url' => $this->string(),
            'is_deleted' => $this->smallInteger()->notNull(),
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
