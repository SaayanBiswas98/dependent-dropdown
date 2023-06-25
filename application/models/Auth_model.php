<?php

class Auth_model extends CI_Model{
    public function __construct(){
        parent::__construct();

    }


    public function create($data){
        $this->db->insert('user',$data);
    }
    public function all(){
        return $user=$this->db->get('user')->result_array();
    }
    public function getuser($id){
        $this->db->where('id',$id);
        return $user=$this->db->get('user')->row_array();

    }
    public function update($form_data,$id){
        $this->db->where('id',$id);
        //print_r($form_data);
        $this->db->update('user',$form_data);

    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('user');

    }
    public function getcountry(){
        return $user=$this->db->get('country')->result_array();

    }
    public function getstatesofacountry($country_id){
        $this->db->where('country_id',$country_id);
        return $user=$this->db->get('states')->result_array();

    }
}