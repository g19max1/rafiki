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

        $service_url = API_URL . 'text/gettextsondate/' . $formattedDate;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $texts = curl_exec($curl);
        curl_close($curl);

        return $texts;
    }

    //get all texts
    public function getAllTexts() {

        $service_url = API_URL . 'text/getalltexts/';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $texts = curl_exec($curl);
        curl_close($curl);

        return $texts;
    }

    public function getPercentageArray() {

        $service_url = API_URL . 'text/getpercentagearray/';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $percentArr = curl_exec($curl);
        curl_close($curl);

        return $percentArr;
    }

    //Get total text count
    public function getTotalCount() {

        $service_url = API_URL . 'text/gettotalcount/';
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
    //get all outgoing texts
    public function getOutgoingTextCount() {

        $service_url = API_URL . 'text/getoutgoingtextcount/';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $count = curl_exec($curl);
        curl_close($curl);

        return $count;
    }
}