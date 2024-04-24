<?php

class Quicknote extends CI_Controller
{
    public $user_id;
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata("auth", 'Not authorized user, login first');
            redirect('user/login');
            exit;
        };
        $this->user_id = $_SESSION['user_id'];
        $this->load->model("QuickNotes");
    }

    public function insert()
    {
        if($this->input->server("REQUEST_METHOD") == "GET") {
            $query_note_cate = $this->db->query("select * from note_cate");
            $note_cate_res = $query_note_cate->result_array();
            $this->load->view("templates/header");
            $this->load->view("quicknote/insert", array("data" => $note_cate_res));
            $this->load->view('templates/footer');

        } elseif($this->input->server("REQUEST_METHOD") == "POST") {
            $form_data = $this->input->post();


            $filtered_data = array();
            foreach($form_data as $k => $v) {
                if($v == "") {
                    continue;
                }
                $filtered_data[$k] = $v;
            }
            $filtered_data['user_id'] = $this->user_id;
            $filtered_data['is_active'] = "1";

            $this->QuickNotes->insert($filtered_data);
            redirect("quicknote/list");
        }
    }

    public function update($id = null)
    {
        if($this->input->server("REQUEST_METHOD") == "GET") {
            $query = $this->db->query('SELECT * FROM note_cate;');
            $note_cates = $query->result_array();
            $no_cate = array('id' => 0,'name' => 'No Cateogry');
            $note_cates[] = $no_cate;
            [$data] = $this->QuickNotes->displayWithId($id);

            // var_dump($data);
            // exit;


            $pass_d = array("note_cates" => $note_cates,"data" => $data);
            $this->load->view("templates/header");
            $this->load->view("quicknote/update", $pass_d);
        } elseif($this->input->server("REQUEST_METHOD") == "POST") {
            $form_data = $this->input->post();
            // $this->load->model("FlashCategories");

            // $filtered_data = array();
            // foreach($form_data as $k => $v) {
            //     if($v == "") {
            //         continue;
            //     }
            //     $filtered_data[$k] = $v;
            // }
            $form_data['update_time'] = date('Y-m-d H:i:s');

            $this->QuickNotes->update($form_data["id"], $form_data);
            redirect("quicknote/list");
        }
    }
    public function list()
    {
        $res = $this->QuickNotes->list($this->user_id);
        $this->load->view("templates/header");
        $this->load->view("quicknote/list", array("data" => $res));
        $this->load->view('templates/footer');

    }
    public function delete($id)
    {
        $this->QuickNotes->delete($id);
        redirect("quicknote/list");
    }

    public function addNoteCate()
    {
        if($this->input->server('REQUEST_METHOD') == "GET") {

            $this->load->view('notecate/insert');

        } elseif($this->input->server('REQUEST_METHOD') == "POST") {
            $form_data = $this->input->post();
            echo("hi");
            $data = array(
                "name" => $form_data['name']
            );
            $this->db->query("insert into note_cate (name) values (?);", $data);


        }
    }

    public function boot()
    {
        $query_note_cate = $this->db->query("select * from note_cate");
        $note_cate_res = $query_note_cate->result_array();



        $this->load->view('templates/boot-header');

        $this->load->view("quicknote/insert", array("data" => $note_cate_res));
        $this->load->view("templates/boot-footer");

    }

}
