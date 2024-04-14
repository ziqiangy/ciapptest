<?php
class QuickNotes extends CI_Model{
    public function insert($data){
        $this->db->insert("quick_notes",$data);
    }
    public function update($id,$data){
        $this->db->update("quick_notes",$data,array('id'=>$id));
    }
    public function displayWithId($id){
        $res = $this->db->get_where("quick_notes",array('id'=>$id),1,0)->result_array();
        return $res;
    }
    public function list($user_id){
        $res = $this->db->get_where("quick_notes",array('user_id'=>$user_id))->result_array();
        return $res;
    }
    public function delete($id){
        $this->db->delete("quick_notes",array("id"=>$id));
    }
}