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
    //get all calls within certain timeframe
    public function getCalls($start, $end) {

        //get calls within certain timeframe
        //Query DB
        $query = $this->db->get_where('call', array('timestamp' >= $start, 'timestamp' <= $end), 20);

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
           $calls = $query->result();
        } else {
            echo("No data returned");
            return null;
        }
        return $calls;
    }

    //get all calls
    public function getAllCalls() {

        //get calls within certain timeframe
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