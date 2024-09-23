<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_posts_table extends CI_Migration
{

    public function up()
    {
        // Define the schema for the posts table
        $this->dbforge->add_field(
            array(
                'post_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE
                ),
                'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE
                ),
                'content' => array(
                    'type' => 'TEXT',
                ),
                'post_likes' => array(
                    'type' => 'TEXT',
                    'null' => TRUE
                ),
                'image_url' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'hidden' => array(
                    'type' => 'INT',
                ),
                'delete' => array(
                    'type' => 'INT',
                ),
                'admin_ban' => array(
                    'type' => 'INT',
                ),
                'created_at' => array(
                    'type' => 'TIMESTAMP',
                    // 'default' => 'CURRENT_TIMESTAMP',
                ),
                'updated_at' => array(
                    'type' => 'TIMESTAMP',


                ),
            )
        );

        // Define the primary key
        $this->dbforge->add_key('post_id', TRUE);

        // Create the table
        $this->dbforge->create_table('posts');
    }

    public function down()
    {
        // Drop the posts table
        $this->dbforge->drop_table('posts');
    }
}
