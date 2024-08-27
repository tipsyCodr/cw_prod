<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Migration_Create_city_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'city_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'city' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'state_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
        ]);

        
        $this->dbforge->add_key('city_id', true);
        $this->dbforge->create_table('city', true, ['ENGINE' => 'MyISAM']);
        
        $cities = [
            ['city' => 'North and Middle Andaman', 'state_id' => 32],
            ['city' => 'South Andaman', 'state_id' => 32],
            ['city' => 'Port Blair', 'state_id' => 32],
            ['city' => 'Ahmedabad', 'state_id' => 5],
            ['city' => 'Surat', 'state_id' => 5],
            ['city' => 'Vadodara', 'state_id' => 5],
            ['city' => 'Rajkot', 'state_id' => 5],
            ['city' => 'Gandhinagar', 'state_id' => 5],
            ['city' => 'Bhopal', 'state_id' => 11],
            ['city' => 'Indore', 'state_id' => 11],
            ['city' => 'Jabalpur', 'state_id' => 11],
            ['city' => 'Gwalior', 'state_id' => 11],
            ['city' => 'Ujjain', 'state_id' => 11],
            ['city' => 'Mumbai', 'state_id' => 12],
            ['city' => 'Pune', 'state_id' => 12],
            ['city' => 'Nagpur', 'state_id' => 12],
            ['city' => 'Nashik', 'state_id' => 12],
            ['city' => 'Aurangabad', 'state_id' => 12],
            ['city' => 'Kolkata', 'state_id' => 24],
            ['city' => 'Howrah', 'state_id' => 24],
            ['city' => 'Durgapur', 'state_id' => 24],
            ['city' => 'Asansol', 'state_id' => 24],
            ['city' => 'Siliguri', 'state_id' => 24],
            ['city' => 'Gurgaon', 'state_id' => 7],
            ['city' => 'Faridabad', 'state_id' => 7],
            ['city' => 'Ambala', 'state_id' => 7],
            ['city' => 'Hisar', 'state_id' => 7],
            ['city' => 'Karnal', 'state_id' => 7],
            ['city' => 'Shimla', 'state_id' => 8],
            ['city' => 'Dharamshala', 'state_id' => 8],
            ['city' => 'Solan', 'state_id' => 8],
            ['city' => 'Mandi', 'state_id' => 8],
            ['city' => 'Kullu', 'state_id' => 8],
            ['city' => 'Jammu', 'state_id' => 9],
            ['city' => 'Srinagar', 'state_id' => 9],
            ['city' => 'Udhampur', 'state_id' => 9],
            ['city' => 'Rajouri', 'state_id' => 9],
            ['city' => 'Pulwama', 'state_id' => 9],
            ['city' => 'Bengaluru', 'state_id' => 10],
            ['city' => 'Mysuru', 'state_id' => 10],
            ['city' => 'Hubli', 'state_id' => 10],
            ['city' => 'Davanagere', 'state_id' => 10],
            ['city' => 'Mangalore', 'state_id' => 10],
            ['city' => 'Thiruvananthapuram', 'state_id' => 6],
            ['city' => 'Kochi', 'state_id' => 6],
            ['city' => 'Kollam', 'state_id' => 6],
            ['city' => 'Kottayam', 'state_id' => 6],
            ['city' => 'Calicut', 'state_id' => 6],
            ['city' => 'Chennai', 'state_id' => 21],
            ['city' => 'Coimbatore', 'state_id' => 21],
            ['city' => 'Madurai', 'state_id' => 21],
            ['city' => 'Tiruchirappalli', 'state_id' => 21],
            ['city' => 'Salem', 'state_id' => 21],
            ['city' => 'Hyderabad', 'state_id' => 1],
            ['city' => 'Secunderabad', 'state_id' => 1],
            ['city' => 'Warangal', 'state_id' => 1],
            ['city' => 'Khammam', 'state_id' => 1],
            ['city' => 'Nizamabad', 'state_id' => 1],
            ['city' => 'Jaipur', 'state_id' => 19],
            ['city' => 'Udaipur', 'state_id' => 19],
            ['city' => 'Jodhpur', 'state_id' => 19],
            ['city' => 'Kota', 'state_id' => 19],
            ['city' => 'Bikaner', 'state_id' => 19],
            ['city' => 'Gwalior', 'state_id' => 11],
            ['city' => 'Bhilai', 'state_id' => 35],
            ['city' => 'Raipur', 'state_id' => 35],
            ['city' => 'Korba', 'state_id' => 35],
            ['city' => 'Bilaspur', 'state_id' => 35],
            ['city' => 'Jagdalpur', 'state_id' => 35],
            ['city' => 'Bhubaneswar', 'state_id' => 17],
            ['city' => 'Cuttack', 'state_id' => 17],
            ['city' => 'Rourkela', 'state_id' => 17],
            ['city' => 'Berhampur', 'state_id' => 17],
            ['city' => 'Sambalpur', 'state_id' => 17],
            ['city' => 'Chandigarh', 'state_id' => 30],
            ['city' => 'Panchkula', 'state_id' => 30],
            ['city' => 'Mohali', 'state_id' => 30],
            ['city' => 'Daman', 'state_id' => 29],
            ['city' => 'Diu', 'state_id' => 29],
            ['city' => 'Pondicherry', 'state_id' => 27],
            ['city' => 'Yanam', 'state_id' => 27],
            ['city' => 'Port Blair', 'state_id' => 32],
            ['city' => 'Lakshadweep', 'state_id' => 28],
            ['city' => 'Andaman', 'state_id' => 32],
            ['city' => 'Chennai', 'state_id' => 21],
            ['city' => 'Puducherry', 'state_id' => 27],
        ];
        
        $this->db->insert_batch('city', $cities);

    }

    public function down()
    {
        $this->dbforge->drop_table('city', true);
    }
}
