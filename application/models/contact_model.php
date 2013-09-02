<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 8/11/13
 * Time: 3:49 PM
 * To change this template use File | Settings | File Templates.
 */

class contact_model extends CI_Model{

    //Build the call model
    function __construct() {
        // load controller parent
        parent::__construct();

        //Load models
        //Load the needed model
        $this->load->model('call_model');
    }

    public function getTopTenContactedCall(){

        $service_url = API_URL . 'contact/gettoptencontactedcall';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $topArr = curl_exec($curl);
        curl_close($curl);

        return $topArr;
    }

    public function getTopTenContactedText(){

        $service_url = API_URL . 'contact/gettoptencontactedtext';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $topArr = curl_exec($curl);
        curl_close($curl);

        return $topArr;
    }

    public function getContactNameById($_id){

        $service_url = API_URL . 'contact/getcontactnamebyid' . '/' . $_id;
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $name = curl_exec($curl);
        curl_close($curl);
        return $name;
    }
}