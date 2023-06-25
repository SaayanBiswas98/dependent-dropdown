<?php

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model','am');
        $this->load->library('form_validation');

    }
    public function index(){
        $this->load->model('Auth_model','am');
        $data['user']=$this->am->getcountry();
        $this->load->view('crud',$data);
    }
    public function save(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','trim|required|max_length[23]');
        $this->form_validation->set_rules('phone','Phone','required|max_length[11]');
        $this->form_validation->set_rules('password','Password','required|max_length[10]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('crud');
        }else{
            ////save to database
            $data=array();
            $data['email']=trim($_POST['email']);
            $data['phone']=trim($this->input->post('phone'));
            $data['password']=trim($this->input->post('password'));
            $data['created_at']=date('Y-m-d');
            


            $this->am->create($data);
            $this->session->set_flashdata('msg','record added');
            redirect(base_url().'index.php/auth/index');

        }
    }
    public function list(){
        $this->load->model('Auth_model','am');
        $data['user']=$this->am->all();
        $this->load->view('list',$data);
    }
    public function edit($id){
        $this->load->model('Auth_model','am');
        $this->load->library('form_validation');
        $this->load->model('Auth_model','am');
        $data['user']=$this->am->getuser($id);
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('phone','Phone','required|max_length[11]');
        $this->form_validation->set_rules('password','Password','required|max_length[10]');
        if($this->form_validation->run()==FALSE){
            $this->load->view('edit',$data);
        }else{
            ////save to database
            $form_data=array();
            $form_data['email']=trim($_POST['email']);
            $form_data['phone']=trim($this->input->post('phone'));
            $form_data['password']=$this->input->post('password');
            
            $this->am->update($form_data,$id);
            $this->session->set_flashdata('msg','record updated successfully');
            redirect(base_url().'index.php/auth/list');

        }
    }
    public function delete_record($id){
        $this->load->model('Auth_model','am');
        $data['user']=$this->am->getuser($id);
        if(empty($data)){
            $this->session->set_flashdata('failure','not found');
            redirect(base_url().'index.php/auth/list');
        }
        $this->am->delete($id);
        $this->session->set_flashdata('success','record deleted');
        redirect(base_url().'index.php/auth/list');

    }
    public function getstates(){
        $country_id=$_POST['country_id'];
        $this->load->model('Auth_model','am');
        $states=$this->am->getstatesofacountry($country_id);
        print_r($states);

        $data=array();
        $data['states']=$states;
        $statesstring=$this->load->view('states-select',$data,true);

        $response['states']=$statesstring;
        echo json_encode($response);


    }
}