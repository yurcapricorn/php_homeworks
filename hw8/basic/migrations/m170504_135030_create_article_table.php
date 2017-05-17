<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m170504_135030_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'content'=>$this->text(),
            'image'=>$this->string(),
            'author_id'=>$this->integer(),
            'category_id'=>$this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
