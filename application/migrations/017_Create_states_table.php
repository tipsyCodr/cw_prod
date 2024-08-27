<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_states_table extends CI_Migration
{
    public function up()
    {
        // Create the table
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => FALSE,
            ),
            'country_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => '1',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('states');

        // Insert initial data
        $data = array(
            array('id' => 1, 'name' => 'Andaman and Nicobar Islands', 'country_id' => 101),
            array('id' => 2, 'name' => 'Andhra Pradesh', 'country_id' => 101),
            array('id' => 3, 'name' => 'Arunachal Pradesh', 'country_id' => 101),
            array('id' => 4, 'name' => 'Assam', 'country_id' => 101),
            array('id' => 5, 'name' => 'Bihar', 'country_id' => 101),
            array('id' => 6, 'name' => 'Chandigarh', 'country_id' => 101),
            array('id' => 7, 'name' => 'Chhattisgarh', 'country_id' => 101),
            array('id' => 8, 'name' => 'Dadra and Nagar Haveli', 'country_id' => 101),
            array('id' => 9, 'name' => 'Daman and Diu', 'country_id' => 101),
            array('id' => 10, 'name' => 'Delhi', 'country_id' => 101),
            array('id' => 11, 'name' => 'Goa', 'country_id' => 101),
            array('id' => 12, 'name' => 'Gujarat', 'country_id' => 101),
            array('id' => 13, 'name' => 'Haryana', 'country_id' => 101),
            array('id' => 14, 'name' => 'Himachal Pradesh', 'country_id' => 101),
            array('id' => 15, 'name' => 'Jammu and Kashmir', 'country_id' => 101),
            array('id' => 16, 'name' => 'Jharkhand', 'country_id' => 101),
            array('id' => 17, 'name' => 'Karnataka', 'country_id' => 101),
            array('id' => 18, 'name' => 'Kenmore', 'country_id' => 101),
            array('id' => 19, 'name' => 'Kerala', 'country_id' => 101),
            array('id' => 20, 'name' => 'Lakshadweep', 'country_id' => 101),
            array('id' => 21, 'name' => 'Madhya Pradesh', 'country_id' => 101),
            array('id' => 22, 'name' => 'Maharashtra', 'country_id' => 101),
            array('id' => 23, 'name' => 'Manipur', 'country_id' => 101),
            array('id' => 24, 'name' => 'Meghalaya', 'country_id' => 101),
            array('id' => 25, 'name' => 'Mizoram', 'country_id' => 101),
            array('id' => 26, 'name' => 'Nagaland', 'country_id' => 101),
            array('id' => 27, 'name' => 'Narora', 'country_id' => 101),
            array('id' => 28, 'name' => 'Natwar', 'country_id' => 101),
            array('id' => 29, 'name' => 'Odisha', 'country_id' => 101),
            array('id' => 30, 'name' => 'Paschim Medinipur', 'country_id' => 101),
            array('id' => 31, 'name' => 'Pondicherry', 'country_id' => 101),
            array('id' => 32, 'name' => 'Punjab', 'country_id' => 101),
            array('id' => 33, 'name' => 'Rajasthan', 'country_id' => 101),
            array('id' => 34, 'name' => 'Sikkim', 'country_id' => 101),
            array('id' => 35, 'name' => 'Tamil Nadu', 'country_id' => 101),
            array('id' => 36, 'name' => 'Telangana', 'country_id' => 101),
            array('id' => 37, 'name' => 'Tripura', 'country_id' => 101),
            array('id' => 38, 'name' => 'Uttar Pradesh', 'country_id' => 101),
            array('id' => 39, 'name' => 'Uttarakhand', 'country_id' => 101),
            array('id' => 40, 'name' => 'Vaishali', 'country_id' => 101),
            array('id' => 41, 'name' => 'West Bengal', 'country_id' => 101),
        );

        $this->db->insert_batch('states', $data);
    }

    public function down()
    {
        // Drop the table
        $this->dbforge->drop_table('states');
    }
}
