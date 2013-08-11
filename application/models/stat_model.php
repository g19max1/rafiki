<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/21/13
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

class stat_model extends CI_Model {

    //Build the call model
    function __construct() {
        // load controller parent
        parent::__construct();

        //Load the needed model
        $this->load->model('call_model');

    }


    /* ****************************************************
     *
     *  Functions for stats
     *
     ******************************************************/
    //get data and calculate interaction index
    public function getInteractionIndex() {
        return rand(0,100);
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsAllTimeCalls(){

        //define string because charting library wants csv
        $countArr = "";

        //for the 10 days prior to today
        for($i = 10, $j = 1; $i >= 1; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);

            //data to be retrieved by $.post jquery
            if($i != 1){
                $countArr .= count($this->call_model->getCallsOnDate($formattedDate)) . ",";
            } else {  //Don't add comma on last value
                $countArr .= count($this->call_model->getCallsOnDate($formattedDate));
            }
        }

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsAllOutgoingCalls(){

        //define string because charting library wants csv
        $countArr = "";

        //for the 10 days prior to today
        for($i = 10, $j = 1; $i >= 1; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);

            //data to be retrieved by $.post jquery
            if($i != 1){
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "outgoing")) . ",";
            } else {  //Don't add comma on last value
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "outgoing"));
            }
        }

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsAnsweredCalls(){

        //define string because charting library wants csv
        $countArr = "";

        //for the 10 days prior to today
        for($i = 10, $j = 1; $i >= 1; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);

            //data to be retrieved by $.post jquery
            if($i != 1){
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "incoming")) . ",";
            } else {  //Don't add comma on last value
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "incoming"));
            }
        }

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsMissedCalls(){

        //define string because charting library wants csv
        $countArr = "";

        //for the 10 days prior to today
        for($i = 10, $j = 1; $i >= 1; $i--, $j++){

            //Build the string
            $timeBuildString = date("Y-m-d") . " -" . $i . " days";

            //Do date math
            $timestamp = strtotime($timeBuildString);

            //Convert timestamp to MySQL datetime format
            $formattedDate = substr(date("Y-m-d H:i:s", $timestamp), 0, 10);

            //data to be retrieved by $.post jquery
            if($i != 1){
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "missed")) . ",";
            } else {  //Don't add comma on last value
                $countArr .= count($this->call_model->getCallsOnDateByType($formattedDate, "missed"));
            }
        }

        return $countArr;
    }
}