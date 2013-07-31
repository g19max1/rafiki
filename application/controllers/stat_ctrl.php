<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/4/13
 * Time: 4:01 AM
 * To change this template use File | Settings | File Templates.
 */

class stat_ctrl extends CI_Controller{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    public function index() {

        //Load needed models
        $this->load->model('ChronModel');
        $this->load->model('call_model');

        //Run functions and store data to be passed to the view
        $callCount = $this->call_model->getTotalCount();
        $outgoingCount = $this->call_model->getOutgoingCallCount();
        $answeredCount = $this->call_model->getAnsweredCallCount();
        $missedCount = $this->call_model->getMissedCallCount();
        $this->ChronModel->addValue();

        //Populate the data into an array to be
        //passed into the view.
        $viewData = array(
            'call_count' => $callCount,
            'outgoing_count' => $outgoingCount,
            'answered_count' => $answeredCount,
            'missed_count' => $missedCount
        );

        //Load the Main View with data
        $this->load->view('stats', $viewData);

    }
}