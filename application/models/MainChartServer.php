<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/7/13
 * Time: 2:38 AM
 * To change this template use File | Settings | File Templates.
 */


//This is the file accessed by the jQuery ajax call.
class MainChartServer extends CI_Model {

    //Data variable that holds data points
    var $data;

    function __construct() {
        // load controller parent
        parent::__construct();

        //initilize data
        $this->setData($this->queryDatabase());

        //Print the data
        $this->returnData();
    }

    //Retrieve values form DB
    private function queryDatabase() {

        //Query DB
        $query = $this->db->get('values', 20);

        //Make sure there is data returned
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            echo("No data returned");
        }
        return 0;
    }

    /**
     * @param array $data
     */
    private function setData($data) {
        $this->data = $data;
    }

    /**
     * @return array
     */
    private function getData() {
        return $this->data;
    }

    //echo to page for js to read in JSON format
    private function returnData() {
        echo(json_encode($this->getData()));
    }
}