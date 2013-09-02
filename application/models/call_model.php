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

        $service_url = API_URL . 'call/getcallsondate/' . $formattedDate;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $calls = curl_exec($curl);
        curl_close($curl);

        return $calls;
    }

    public function getCallsOnDateByType($_date, $_type){

        $service_url = API_URL . 'call/getcallsOndatebytype/' . $_date . '/' . $_type;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $calls = curl_exec($curl);
        curl_close($curl);

        return $calls;
    }

    //get all calls
    public function getAllCalls() {

        $service_url = API_URL . 'call/getallcalls';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $calls = curl_exec($curl);
        curl_close($curl);

        return $calls;
    }

    public function getPercentageArray() {

        $service_url = API_URL . 'call/getpercentagearray';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $percentArr = curl_exec($curl);
        curl_close($curl);

        return $percentArr;
    }

    //Get total call count
    public function getTotalCount(){

        $service_url = API_URL . 'call/gettotalcount';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $count = curl_exec($curl);
        curl_close($curl);

        return $count;
    }

    /* ****************************************************
     *
     *  Functions for outgoing
     *
     ******************************************************/
    //get all outgoing calls
    public function getOutgoingCallCount(){

        $service_url = API_URL . 'call/getoutgoingcallcount';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $count = curl_exec($curl);
        curl_close($curl);

        return $count;
    }

    /* ****************************************************
     *
     *  Functions for answered
     *
     ******************************************************/
    //get all Answered calls
    public function getAnsweredCallCount(){

        $service_url = API_URL . 'call/getansweredcallcount';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $count = curl_exec($curl);
        curl_close($curl);

        return $count;
    }

    /* ****************************************************
     *
     *  Functions for missed
     *
     ******************************************************/
    //get all missed calls
    public function getMissedCallCount(){

        $service_url = API_URL . 'call/getmissedcallcount';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $count = curl_exec($curl);
        curl_close($curl);

        return $count;
    }
}