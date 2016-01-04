<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Task model
*/
class Task_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_all(){

        $tasks = $this->db->select('*')
            ->from('task')
            ->order_by('task_id')
            ->where('is_deleted','N')
            ->get();

        if ($tasks->num_rows() > 0) {

            return $tasks->result_array();
        }
        else{

            return NULL;
        }
    }

    public function insert($data = NULL)
    {
        if ($data != NULL) {

            $data_to_insert = array(
                'task_name' => $data['task_name'],
                'task_start' => $data['task_start'],
                'task_end' => $data['task_end'],
                'is_finish' => 'N',
                'is_deleted' => 'N',
            );

            $status = $this->db->insert('task',$data_to_insert);

            return $status;
        }

        return FALSE;
    }

    public function update($data = NULL)
    {
        if ($data != NULL) {

            $data_to_update = array(
                'task_name' => $data['task_name'],
                'task_start' => $data['task_start'],
                'task_end' => $data['task_end'],
                'is_finish' => $data['is_finish'],
            );

            $task_id = $data['task_id'];

            $this->db->where('task_id',$task_id);
            $status = $this->db->update('task',$data_to_update);

            return $status;
        }

        return FALSE;
    }

    public function delete($task_id = NULL)
    {
        if ($task_id != NULL) {

            $data_to_update = array(
                'is_deleted' => 'Y',
            );

            $this->db->where('task_id',$task_id);
            $status = $this->db->update('task',$data_to_update);

            return $status;
        }

        return FALSE;
    }

    public function finish($task_id = NULL)
    {
        if ($task_id != NULL) {

            $data_to_update = array(
                'is_finish' => 'Y',
            );

            $this->db->where('task_id',$task_id);
            $status = $this->db->update('task',$data_to_update);

            return $status;
        }

        return FALSE;
    }

    public function unfinish($task_id = NULL)
    {
        if ($task_id != NULL) {

            $data_to_update = array(
                'is_finish' => 'N',
            );

            $this->db->where('task_id',$task_id);
            $status = $this->db->update('task',$data_to_update);

            return $status;
        }

        return FALSE;
    }
}

?>
