<?php
/**
 * Created by IntelliJ IDEA.
 * User: Parker Lawson
 * Date: 7/4/13
 * Time: 4:01 AM
 * To change this template use File | Settings | File Templates.
 */

class dashboard_ctrl extends CI_Controller{

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
        $this->load->model('call_model');
        $this->load->model('stat_model');
        $this->load->model('text_model');

        //Run functions and store data to be passed to the view
        //Call Stuff
        $callCount = $this->call_model->getTotalCount();
        $outgoingCount = $this->call_model->getOutgoingCallCount();
        $answeredCount = $this->call_model->getAnsweredCallCount();
        $missedCount = $this->call_model->getMissedCallCount();
        $callPercentageArr = $this->call_model->getPercentageArray();
        $callChangePercentageArrowDirection = $callPercentageArr["direction"];
        $callChangePercentage = $callPercentageArr["value"];
        $percentCallsAnswered = 100 * ($answeredCount / $callCount);
        $interactionIndex = $this->stat_model->getInteractionIndex();
        //Text Stuff
        $textCount = $this->text_model->getTotalCount();
        $textPercentageArr = $this->text_model->getPercentageArray();
        $textChangePercentageArrowDirection = $textPercentageArr["direction"];
        $textChangePercentage = $textPercentageArr["value"];
        //Mini bars data
        $miniBarAllCalls = $this->stat_model->getMiniBarsAllTimeCalls();
        $miniBarAllOutgoing = $this->stat_model->getMiniBarsAllOutgoingCalls();
        $miniBarAnswered = $this->stat_model->getMiniBarsAnsweredCalls();
        $miniBarMissed = $this->stat_model->getMiniBarsMissedCalls();

        //Populate the data into an array to be
        //passed into the view.
        $viewData = array(
            'call_count' => $callCount,
            'outgoing_count' => $outgoingCount,
            'answered_count' => $answeredCount,
            'missed_count' => $missedCount,
            'call_change_percentage_arrow_direction' => $callChangePercentageArrowDirection,
            'call_change_percentage' => $callChangePercentage,
            'percent_calls_answered' => $percentCallsAnswered,
            'interaction_index' => $interactionIndex,

            'text_count' => $textCount,
            'text_change_percentage_arrow_direction' => $textChangePercentageArrowDirection,
            'text_change_percentage' => $textChangePercentage,

            'mini_bar_all_calls' => $miniBarAllCalls,
            'mini_bar_all_outgoing' => $miniBarAllOutgoing,
            'mini_bar_answered' => $miniBarAnswered,
            'mini_bar_missed' => $miniBarMissed,
        );

        //Load the Main View with data
        $this->load->view('dashboard', $viewData);

    }
}