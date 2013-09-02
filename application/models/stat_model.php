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

        $service_url = API_URL . 'stat/getminibarsalltimecalls';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $countArr = curl_exec($curl);
        curl_close($curl);

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsAllOutgoingCalls(){

        $service_url = API_URL . 'stat/getMiniBarsAllOutgoingCalls';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $countArr = curl_exec($curl);
        curl_close($curl);

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsAnsweredCalls(){

        $service_url = API_URL . 'stat/getMiniBarsAnsweredCalls';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $countArr = curl_exec($curl);
        curl_close($curl);

        return $countArr;
    }

    //Get values for mini data charts on sidebar
    public function getMiniBarsMissedCalls(){

        $service_url = API_URL . 'stat/getMiniBarsMissedCalls';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $countArr = curl_exec($curl);
        curl_close($curl);

        return $countArr;
    }
}