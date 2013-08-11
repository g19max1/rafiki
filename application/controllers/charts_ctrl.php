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

        //define array
        $countArr = array();

        //for the days prior to today
        for($i = 29, $j = 1; $i >= 0; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);
            //$countArr[$i]['date'] = $formattedDate;

            //data to be retrieved by $.post jquery
            //$countArr[$formattedDate][$i] = count($this->call_model->getCallsOnDate($formattedDate));
            $countArr[$j] = count($this->call_model->getCallsOnDate($formattedDate));
        }

        echo (json_encode($countArr));

    }

    public function getTextValues() {

        //Load the needed model
        $this->load->model('text_model');

        //define array
        $countArr = array();

        //for the 30 days prior to today
        for($i = 29, $j = 1; $i >= 0; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);

            //data to be retrieved by $.post jquery
            $countArr[$j] = count($this->text_model->getTextsOnDate($formattedDate));
        }

        echo (json_encode($countArr));

    }


}