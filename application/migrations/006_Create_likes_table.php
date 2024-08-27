<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_likes_table extends CI_Migration {

    public function up()
    {
        // Define the schema for the likes table
        $this->dbforge->add_field(array(
            'like_id' => array(
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
            'created_at' => array(
                'type' => 'TIMESTAMP',
             
            ),
        ));

        // Define the primary key
        $this->dbforge->add_key('like_id', TRUE);

        // Add foreign keys
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (post_id) REFERENCES Posts(post_id)');
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES Users(user_id)');

        // Create the table
        $this->dbforge->create_table('likes');
    }

    public function down()
    {
        // Drop the likes table
        $this->dbforge->drop_table('likes');
    }
}
