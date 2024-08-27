<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_state_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'state_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('state_id', true);
        $this->dbforge->create_table('state', true, ['ENGINE' => 'MyISAM']);

        // Seed data
        $data = [
            ['state' => 'ANDHRA PRADESH'],
            ['state' => 'ASSAM'],
            ['state' => 'ARUNACHAL PRADESH'],
            ['state' => 'BIHAR'],
            ['state' => 'GUJRAT'],
            ['state' => 'HARYANA'],
            ['state' => 'HIMACHAL PRADESH'],
            ['state' => 'JAMMU & KASHMIR'],
            ['state' => 'KARNATAKA'],
            ['state' => 'KERALA'],
            ['state' => 'MADHYA PRADESH'],
            ['state' => 'MAHARASHTRA'],
            ['state' => 'MANIPUR'],
            ['state' => 'MEGHALAYA'],
            ['state' => 'MIZORAM'],
            ['state' => 'NAGALAND'],
            ['state' => 'ORISSA'],
            ['state' => 'PUNJAB'],
            ['state' => 'RAJASTHAN'],
            ['state' => 'SIKKIM'],
            ['state' => 'TAMIL NADU'],
            ['state' => 'TRIPURA'],
            ['state' => 'UTTAR PRADESH'],
            ['state' => 'WEST BENGAL'],
            ['state' => 'DELHI'],
            ['state' => 'GOA'],
            ['state' => 'PONDICHERY'],
            ['state' => 'LAKSHDWEEP'],
            ['state' => 'DAMAN & DIU'],
            ['state' => 'DADRA & NAGAR'],
            ['state' => 'CHANDIGARH'],
            ['state' => 'ANDAMAN & NICOBAR'],
            ['state' => 'UTTARANCHAL'],
            ['state' => 'JHARKHAND'],
            ['state' => 'CHATTISGARH'],
        ];

        $this->db->insert_batch('state', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('state', true);
    }
}
