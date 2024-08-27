<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_comments_table extends CI_Migration {

    public function up()
    {
        // Define the schema for the comments table
        $this->dbforge->add_field(array(
            'comment_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'post_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'comment_text' => array(
                'type' => 'TEXT',
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
               
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
              
            ),
        ));

        // Define the primary key
        $this->dbforge->add_key('comment_id', TRUE);

        // Add foreign keys
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (post_id) REFERENCES Posts(post_id)');
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES Users(user_id)');

        // Create the table
        $this->dbforge->create_table('comments');
    }

    public function down()
    {
        // Drop the comments table
        $this->dbforge->drop_table('comments');
    }
}
