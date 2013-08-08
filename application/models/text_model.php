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

    //Get total text count
    public function getTotalCount(){
        return $this->db->count_all_results('text');
    }

    /* ****************************************************
     *
     *  Functions for outgoing
     *
     ******************************************************/
    //get all outgoing texts
    public function getOutgoingTextCount(){

        //get all ougoing texts
        //Query DB
        $this->db->where('type', 'outgoing'); //Where type = outgoing
        $this->db->from('text'); //which table
        $count = $this->db->count_all_results(); //count the results

        return $count;
    }
}