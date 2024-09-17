<?php

class Migration_Create_gotram_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'gotra_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'gotra_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'default' => NULL,
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'default' => NULL,
            ),
        ));
        $this->dbforge->add_key('gotra_id', TRUE);
        $this->dbforge->create_table('gotra');

        // $gotra_data = array(
        //     array('gotra_name' => 'Kaushika'),
        //     array('gotra_name' => 'Kaundinya'),
        //     array('gotra_name' => 'Audala'),
        //     array('gotra_name' => 'Manu'),
        //     array('gotra_name' => 'Angirasa'),
        //     array('gotra_name' => 'Marichi'),
        //     array('gotra_name' => 'Atri'),
        //     array('gotra_name' => 'Meena'),
        //     array('gotra_name' => 'Aatreya'),
        //     array('gotra_name' => 'Parashar'),
        //     array('gotra_name' => 'Bharadwaj'),
        //     array('gotra_name' => 'Sandilya'),
        //     array('gotra_name' => 'Bhargava'),
        //     array('gotra_name' => 'Shiva(Shiv-adi)'),
        //     array('gotra_name' => 'Bhrigu'),
        //     array('gotra_name' => 'Siwal'),
        //     array('gotra_name' => 'Brihadbala'),
        //     array('gotra_name' => 'Upamanyu'),
        //     array('gotra_name' => 'Chandratre'),
        //     array('gotra_name' => 'Upreti'),
        //     array('gotra_name' => 'Dhananjaya'),
        //     array('gotra_name' => 'Vashista'),
        //     array('gotra_name' => 'Garg'),
        //     array('gotra_name' => 'Vishnu'),
        //     array('gotra_name' => 'Gautam'),
        //     array('gotra_name' => 'Vishvamitra'),
        //     array('gotra_name' => 'Harinama'),
        //     array('gotra_name' => 'Yadav'),
        //     array('gotra_name' => 'Haritasya'),
        //     array('gotra_name' => 'Jamadagni'),
        //     array('gotra_name' => 'Kadam'),
        //     array('gotra_name' => 'Kashyapa'),
        // );
        $gotra_data = array(
            array('gotra_name' => 'Vatsa'),
            array('gotra_name' => 'Gautama'),
            array('gotra_name' => 'Bharadwaja'),
            array('gotra_name' => 'Kashyap'),
            array('gotra_name' => 'Vasishtha'),
            array('gotra_name' => 'Agnivesh'),
            array('gotra_name' => 'Atri'),
            array('gotra_name' => 'Angiras'),
            array('gotra_name' => 'Bhrigu'),
            array('gotra_name' => 'Kanva'),
        );
        $this->db->insert_batch('gotra', $gotra_data);
    }

    public function down()
    {
        $this->dbforge->drop_table('gotra');
    }
}
