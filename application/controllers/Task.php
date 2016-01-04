<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Task controller
*/
class Task extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper(['url','form',]);
        $this->load->model(['task_m']);
        $this->load->library(['form_validation','session','encrypt']);
    }

    public function test(){

        $this->load->library('unit_test');
        //$this->unit->active(FALSE);

        $expected_result = '2015-11-04 00:00:00';
        $test =  $this->reformate_date('04-11-2015 00:00');

        $this->unit->run($test,$expected_result,'Test reformate date function');

        echo $this->unit->report();
    }

    public function index()
    {

        $this->session->set_userdata('username','zahid');

        $data['tasks'] = $this->task_m->get_all();
        $this->load->view('task-list.php',$data);
    }

    public function add(){
        $this->form_validation->set_rules('task_name', 'Task name', 'required');
        $this->form_validation->set_rules('task_start', 'Start', 'required|date');
        $this->form_validation->set_rules('task_end', 'End', 'required|date');

        if ($this->form_validation->run() == false) {
            $this->index();
        }
        else{
            $data['task_name'] = $this->input->post('task_name');
            $data['task_start'] = $this->reformate_date($this->input->post('task_start'));
            $data['task_end'] = $this->reformate_date($this->input->post('task_end'));

            //var_dump($data);

            $status = $this->task_m->insert($data);

            if ($status) {

                $this->session->set_flashdata('alert-success','The task was added!');
            }
            else{
                $this->session->set_flashdata('alert-error','The task is not successfully added!');
            }

            redirect('/');
        }
    }

    private function reformate_date($date){
        return date('Y-m-d H:i:s',strtotime($date));
    }

    public function edit($task_id = NULL){

        $this->form_validation->set_rules('task_name', 'Task name', 'required');
        $this->form_validation->set_rules('task_start', 'Start', 'required|date');
        $this->form_validation->set_rules('task_end', 'End', 'required|date');
        $this->form_validation->set_rules('is_finish', 'Finish', 'required');

        if ($this->form_validation->run() == false) {
            $this->index();
        }
        else{
            $data['task_id'] = $task_id;
            $data['task_name'] = $this->input->post('task_name');
            $data['task_start'] = $this->reformate_date($this->input->post('task_start'));
            $data['task_end'] = $this->reformate_date($this->input->post('task_end'));
            $data['is_finish'] = $this->input->post('is_finish');

            //var_dump($data);

            $status = $this->task_m->update($data);

            if ($status) {

                $this->session->set_flashdata('alert-success','The task was edited!');
            }
            else{
                $this->session->set_flashdata('alert-error','The task is not successfully edited!');
            }

            redirect('/');
        }
    }

    public function delete($task_id = NULL){

        $status = $this->task_m->delete($task_id);

        if ($status) {

            $this->session->set_flashdata('alert-success','The task was deleted!');
        }
        else{
            $this->session->set_flashdata('alert-error','The task is not successfully deleted!');
        }

        redirect('/');
    }

    public function finish($task_id = NULL){

        $status = $this->task_m->finish($task_id);

        if ($status) {

            $this->session->set_flashdata('alert-success','The task was edited!');
        }
        else{
            $this->session->set_flashdata('alert-error','The task is not successfully edited!');
        }

        redirect('/');
    }

    public function unfinish($task_id = NULL){

        $status = $this->task_m->unfinish($task_id);

        if ($status) {

            $this->session->set_flashdata('alert-success','The task was edited!');
        }
        else{
            $this->session->set_flashdata('alert-error','The task is not successfully edited!');
        }

        redirect('/');
    }
}

?>
