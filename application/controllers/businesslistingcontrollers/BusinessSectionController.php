<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BusinessSectionController extends CI_Controller {

    public function index() {
        $this->load->view('listingviews/businesslistingviews/index');
    }
 
}

?>