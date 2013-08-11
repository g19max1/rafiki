<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/21/13
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

class call_model extends CI_Model {

    //Build the call model
    function __construct() {
        // load controller parent
        parent::__construct();
    }


    /* ****************************************************
     *
     *  Functions for all calls
     *
     ******************************************************/
    //get all calls within certain date
    public function getCallsOnDate($formattedDate) {

        //get calls within certain timeframe
        //Query DB
        $this->db->like('timestamp', $formattedDate, 'after');
        $query = $this->db->get('call');

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
           $calls = $query->result();
        } else {
            return null;
        }
        return $calls;
    }

    public function getCallsOnDateByType($_date, $_type){

        //Get calls on date by type
        $queryString = "SELECT id FROM `call` WHERE type = \"" . $_type . "\" AND timestamp LIKE \"" . $_date . "%\"";
        $query = $this->db->query($queryString);

        $count = count($query->result());

        //Make sure there is data returned
        if (!$count > 0) {
            return null;
        }

        return $count;
    }

    //get all calls
    public function getAllCalls() {

        //get calls
        //Query DB
        $query = $this->db->get('call', 20);

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
            $calls = $query->result();
        } else {
            echo("No data returned");
            return null;
        }
        return $calls;
    }

    public function getPercentageArray() {

        //Create Array
        $percentArr = array();
        //Build the string
        $yesterdayString = date("Y-m-d") . " -1 days";
        //Do date math
        $yesterdayTimestamp = strtotime($yesterdayString);
        //Convert timestamp to MySQL datetime format
        $yesterdayFormattedDate = substr(date("Y-m-d H:i:s", $yesterdayTimestamp), 0, 10);
        //data to be retrieved by $.post jquery
        $totalCallsYesterday = count($this->getCallsOnDate($yesterdayFormattedDate));
        $totalCallsToday = count($this->getCallsOnDate(date("Y-m-d")));
        $percentChange = 0;
        if ($totalCallsToday != 0){
            $percentChange = $totalCallsToday - $totalCallsYesterday;
        }
        if ($percentChange > 0){
            $direction = "up";
            $percentString = "+ " . $percentChange;

        } else {
            $direction = "down";
            $percentString = "- " . $percentChange;
        }
        $percentArr["direction"] = $direction;
        $percentArr["value"] = $percentString;

        return $percentArr;
    }

    //Get total call count
    public function getTotalCount(){
        return $this->db->count_all_results('call');
    }

    /* ****************************************************
     *
     *  Functions for outgoing
     *
     ******************************************************/
    //get all outgoing calls
    public function getOutgoingCallCount(){

        //get all ougoing calls
        //Query DB
        $this->db->where('type', 'outgoing'); //Where type = outgoing
        $this->db->from('call'); //which table
        $count = $this->db->count_all_results(); //count the results

        return $count;
    }

    /* ****************************************************
     *
     *  Functions for answered
     *
     ******************************************************/
    //get all Answered calls
    public function getAnsweredCallCount(){

        //get all Answered calls
        //Query DB
        $this->db->where('type', 'incoming'); //Where type = outgoing
        $this->db->from('call'); //which table
        $count = $this->db->count_all_results(); //count the results

        return $count;
    }

    /* ****************************************************
     *
     *  Functions for missed
     *
     ******************************************************/
    //get all missed calls
    public function getMissedCallCount(){

        //get all missed calls
        //Query DB
        $this->db->where('type', 'missed'); //Where type = outgoing
        $this->db->from('call'); //which table
        $count = $this->db->count_all_results(); //count the results

        return $count;
    }
}