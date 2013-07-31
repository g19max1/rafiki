<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/7/13
 * Time: 2:46 AM
 * To change this template use File | Settings | File Templates.
 */

class charts_ctrl extends CI_Controller{

    function __construct() {

        // load controller parent
        parent::__construct();
    }

    public function getCallValues() {

        //Load the needed model
        $this->load->model('call_model');

        //for the 30 days prior to today
        for($i = 1; $i <= 30; $i++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = date("Y-m-d H:i:s", $timestamp);

            //data to be retrieved by $.post jquery
            $countArr[$i] = count($this->call_model->getCalls($formattedDate));
        }

        //Encode the data in a JSON array
        echo (json_encode($countArr));

    }


}