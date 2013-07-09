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

    //Load the data for the main chart
    public function main() {

        //Serve up data. TRUE for autoconnect
        //$this->load->model("MainChartServer", '', TRUE);
        $this->load->model('MainChartServer');

    }


}