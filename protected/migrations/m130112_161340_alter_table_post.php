<?php

class m130112_161340_alter_table_post extends CDbMigration
{
	public function up()
    {
        $sql = <<< EOL
ALTER TABLE `{{post}}`
ADD `intro` text COLLATE 'utf8_unicode_ci' NOT NULL AFTER `title`;
EOL;
        $this->execute($sql);
	}

	public function down()
	{
		$this->dropColumn('{{post}}', 'intro');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
