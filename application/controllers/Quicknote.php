<?php
class Quicknote extends CI_Controller{
    public $user_id;
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata("auth",'Not authorized user, login first');
            redirect('user/login');
            exit;
        };
        $this->user_id = $_SESSION['user_id'];
        $this->load->model("QuickNotes");
    }

    public function insert(){
        if($this->input->server("REQUEST_METHOD")=="GET"){
            $query_note_cate = $this->db->query("select * from note_cate");
            $note_cate_res = $query_note_cate->result_array();
            // var_dump($note_cate_res);
            $this->load->view("templates/header");
            $this->load->view("quicknote/insert",array("data"=>$note_cate_res));
        }elseif($this->input->server("REQUEST_METHOD")=="POST"){
            $form_data = $this->input->post();
            $data = array(
                "user_id" => $this->user_id,
                "content" => $form_data["content"],
                "cate_id" => $form_data["cate_id"],
            );
            // $this->load->model("FlashCategories");
            $this->QuickNotes->insert($data);
            redirect("quicknote/list");
        }
    }

    public function update($id = NULL){
        if($this->input->server("REQUEST_METHOD")=="GET"){
            // $this->load->model("FlashCategories");
            $query = $this->db->query('SELECT * FROM note_cate;');
            $note_cates = $query->result_array();
            $no_cate = array('id'=>0,'name'=>'No Cateogry');
            $note_cates[]=$no_cate;
            [$data] = $this->QuickNotes->displayWithId($id);
            $pass_d = array("note_cates"=>$note_cates,"data"=>$data);
            $this->load->view("templates/header");
            $this->load->view("quicknote/update",$pass_d);
        }elseif($this->input->server("REQUEST_METHOD")=="POST"){
            $form_data = $this->input->post();
            // $this->load->model("FlashCategories");
            $this->QuickNotes->update($form_data["id"],array("content"=>$form_data["content"],"cate_id"=>$form_data["cate_id"]));
            redirect("quicknote/list");
        }
    }
    public function list(){
        $res = $this->QuickNotes->list($this->user_id);
        $this->load->view("templates/header");
        $this->load->view("quicknote/list",array("data"=>$res));
    }
    public function delete($id){
        $this->QuickNotes->delete($id);
        redirect("quicknote/list");
    }

    public function addNoteCate(){
        if($this->input->server('REQUEST_METHOD')=="GET"){
            
            $this->load->view('notecate/insert');

        }elseif($this->input->server('REQUEST_METHOD')=="POST"){
            $form_data = $this->input->post();
            echo("hi");
            $data = array(
                "name"=>$form_data['name']
            );
            $this->db->query("insert into note_cate (name) values (?);",$data);


        }
    }

}