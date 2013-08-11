<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/21/13
 * Time: 1:37 PM
 * To change this template use File | Settings | File Templates.
 */

class text_model extends CI_Model {

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
    public function getTextsOnDate($formattedDate) {

        //get calls within certain timeframe
        //Query DB
        $this->db->like('timestamp', $formattedDate, 'after');
        $query = $this->db->get('text');

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
            $texts = $query->result();
        } else {
            return null;
        }
        return $texts;
    }

    //get all texts
    public function getAllTexts() {

        //get texts
        //Query DB
        $query = $this->db->get('text', 20);

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
            $texts = $query->result();
        } else {
            echo("No data returned");
            return null;
        }
        return $texts;
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
        $totalTextsYesterday = count($this->getTextsOnDate($yesterdayFormattedDate));
        $totalTextsToday = count($this->getTextsOnDate(date("Y-m-d")));
        $percentChange = 0;
        if ($totalTextsToday != 0){
            $percentChange = ($totalTextsToday - $totalTextsYesterday);
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

    //Get total text count
    public function getTotalCount() {
        return $this->db->count_all_results('text');
    }

    /* ****************************************************
     *
     *  Functions for outgoing
     *
     ******************************************************/
    //get all outgoing texts
    public function getOutgoingTextCount() {

        //get all ougoing texts
        //Query DB
        $this->db->where('type', 'outgoing'); //Where type = outgoing
        $this->db->from('text'); //which table
        $count = $this->db->count_all_results(); //count the results

        return $count;
    }
}