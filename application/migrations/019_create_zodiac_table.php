<?php

class Migration_Create_zodiac_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('zodiac');
        $data = array(
            array('name' => 'Aries'),
            array('name' => 'Taurus'),
            array('name' => 'Gemini'),
            array('name' => 'Cancer'),
            array('name' => 'Leo'),
            array('name' => 'Virgo'),
            array('name' => 'Libra'),
            array('name' => 'Scorpio'),
            array('name' => 'Sagittarius'),
            array('name' => 'Capricorn'),
            array('name' => 'Aquarius'),
            array('name' => 'Pisces'),
        );
        $this->db->insert_batch('zodiac', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('zodiac');
    }

}
