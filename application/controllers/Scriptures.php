<?php

class Scriptures extends CI_Controller
{
    public function search_v()
    {
        $q_v = $this->db->query("SELECT * FROM `volumes`");
        $res_v = $q_v->result();
        // var_dump($res_v);
        $this->load->view('scripture/index', array('data' => $res_v));
    }
    public function search_v_json()
    {
        $q_v = $this->db->query("SELECT * FROM `volumes`");
        $res_v = $q_v->result_array();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Content-Type:application/json');
            echo json_encode($res_v);
        }

    }

    public function search_b_json()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();
            $q_b = $this->db->query("SELECT * FROM `books` WHERE `volume_id` = ?", $data["id"]);
            $res_b = $q_b->result_array();
            header('Content-Type:application/json');
            echo json_encode($res_b);
        }

    }

    public function search_c_json()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();
            $q_c = $this->db->query("SELECT * FROM `chapters` WHERE `book_id` = ?", $data["id"]);
            $res_c = $q_c->result_array();
            header('Content-Type:application/json');
            echo json_encode($res_c);
        }

    }


    public function search_ve_json()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();
            $q_v = $this->db->query("SELECT * FROM `verses` WHERE `chapter_id` = ?", $data["id"]);
            $res_v = $q_v->result_array();
            header('Content-Type:application/json');
            echo json_encode($res_v);
        }

    }
    public function search_verse_api()
    {
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = $this->input->post();

            $q = $this->db->query("SELECT * FROM `verses` WHERE `id` = ?", $data["id"]);
            $res = $q->result_array();

            header('Content-Type:application/json');
            echo json_encode($res);


        }
    }
}
