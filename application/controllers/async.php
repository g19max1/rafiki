<?php
class Async extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getCallByDay($timestamp) {

        //Convert timestamp to MySQL datetime format
        $formattedDate = date("Y-m-d H:i:s", $timestamp);

        //Load the needed model
        $this->load->model('call_model');

        //echo data to be retrieved by $.post jquery
        echo count($this->call_model->getCalls($formattedDate));
    }

}