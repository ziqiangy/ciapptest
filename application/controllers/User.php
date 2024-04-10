<?php
class User extends CI_Controller{

    

    

    public function register(){

        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $this->load->view('templates/header');
            $this->load->view('user/register');
            $this->load->view('templates/footer');
         } elseif ($this->input->server('REQUEST_METHOD') === 'POST') {


            $form_data = $this->input->post(); 
            if(!isset($form_data['weakpassword'])){
                $this->form_validation->set_rules("password","Password","trim|required|callback_email_check");
            }
            $form_data = array(
                'firstname'=>$form_data['firstname'],
                'lastname'=>$form_data['lastname'],
                'username'=>$form_data['username'],
                'email'=>$form_data['email'],
                'password'=>$form_data['password']
            );
            $this->form_validation->set_rules("firstname","Firstname","trim|required|min_length[3]");
            $this->form_validation->set_rules("lastname","Lastname","trim|required|min_length[3]");
            $this->form_validation->set_rules("username","Username","trim|required|min_length[3]|is_unique[users.username]");
            $this->form_validation->set_rules("email","Email","trim|required|valid_email|is_unique[users.email]");

            if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('templates/header');
                    $this->load->view('user/register');
                    $this->load->view('templates/footer');
                }else{
                    $form_data['password'] = $this->hashPass($form_data['password']);
                    $this->load->model("Users");
                    $this->Users->insertOneUser($form_data);
                    redirect('/user/login', 'refresh');
                }
         }       
    }

    /**
     * tool
     */
    public function email_check($str){
        if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-~]).{8,}$/",$str)){
            $this->form_validation->set_message('email_check', '%s is too simple');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function login(){
        if($this->input->server('REQUEST_METHOD')==='GET'){
            $this->load->view('templates/header');
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        }
        elseif ($this->input->server('REQUEST_METHOD')==='POST')
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $sql = "SELECT * FROM superadmin WHERE username = ?";
            $query = $this->db->query($sql, array($username));
            $row = $query->row();
            if (isset($row)){
                //Super Admin trying login
                if($password == $row->password){
                    
                    $_SESSION['superadmin']=1;

                    $this->load->view('templates/header');
                    $this->load->view('user/admincontrol');
                    $this->load->view('templates/footer');
                    
                } else {
                    echo "superadmin wrong password";
                    exit;
                }
            }else{
                //check regular user login
                $this->load->model("Users");
                if($this->Users->searchByUsername($username)||$this->Users->searchByEmail($username)){
                    $this->Users->searchByUsername($username) ? [$data] = $this->Users->searchByUsername($username) : [$data] = $this->Users->searchByEmail($username);
                    if($data['is_active']==1) {
                        $formPass = $this->hashPass($password);
                        $dbPass = $data['password'];
                        if($dbPass==$formPass){
                            $_SESSION['user_id']=$data['id'];
                            $_SESSION['username']=$data['username'];
                            // redirect('user/profile','refresh');
                            redirect('user/profile','refresh');
                        }
                        else{
                            $this->load->view('templates/header');
                            $this->load->view('user/login',array('err'=>'Wrong password, please re-enter your password'));
                        }
                    } 
                    else{
                        $this->load->view('templates/header');
                        $this->load->view('user/login',array('err'=>'The user account is closed, please contact admin'));
                    }
                }
                else{
                    $this->load->view('templates/header');
                    $this->load->view('user/login',array('err'=>'username or email not exist'));
                }

            } 
        }
    }

    /**
     * tool
     */
    public function hashPass($formPass){
        $salt1 = "qzu$<.";
        $salt2 = "p1g!~*";
        $pass = $formPass;
        $hashPass = hash("ripemd128","$salt1$pass$salt2");
        return $hashPass;
    }


    public function profile(){
        if(!isset($_SESSION['user_id'])) {
            $this->session->set_flashdata("auth",'Not authorized user, login first');
            redirect('user/login');
            exit;
        };
        $this->load->model("Users");
        [$data] = $this->Users->searchCurrentUser($_SESSION['user_id']);

        $this->load->view('templates/header');
        $this->load->view('user/profile',$data);
    }

    public function forgetPassword(){
        if($this->input->server('REQUEST_METHOD')==='GET'){
            $this->load->view('templates/header');
            $this->load->view('user/forgetPassword');
        } elseif ($this->input->server('REQUEST_METHOD')==='POST') {
            $form_data = $this->input->post();
            $this->load->model("Users");

            if(!$this->Users->searchByEmail($form_data['email'])){
                $this->load->view('templates/header');
                $this->load->view("user/forgetPassword",array('err'=>'not find this user, try again'));
            }elseif(!$this->Users->userIsActive($form_data['email'])){
                $this->load->view('templates/header');
                $this->load->view("user/forgetPassword",array('err'=>'This user is not disabled, contact admin'));
            }else{
                [$res] = $this->Users->searchByEmail($form_data['email']);
                $this->load->view('templates/header');
                $this->load->view("user/newPassword",array('id'=>$res["id"])); 
            }
        }
        
    }

    public function newPassword($id = NULL){
        if($this->input->server("REQUEST_METHOD")==="GET"){
            $this->load->view('templates/header');
            $this->load->view('user/newPassword',array('id'=>$id));
        } elseif ($this->input->server('REQUEST_METHOD')==="POST"){
            $form_data = $this->input->post();
            if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-~]).{8,}$/",$form_data['password'])){
                $this->session->set_flashdata("auth",'password is not strong enough.');
                redirect('user/newPassword/'.strval($form_data['id']));
                //remember redirect is a get request, view with data is a post request


                //not able to load any view here, conflict when using load view here.
                // var_dump($this);
                // $this->load->view('user/newPassword',array('err'=>'password is not strong enough'));
                
                exit;
            }else{
                $password = $this->hashPass($form_data['password']);
                $id = $form_data['id'];
                $this->load->model("Users");
                $this->Users->updateCurrentUserFields($id,array('password'=>$password));
                $this->session->set_flashdata("auth",'password reset successfully');
                redirect('user/login');
            }

            
        }

    }

    public function update(){
        $form_data = $this->input->post();
        // print_r($form_data);
        $id = $form_data["id"];
        $data = array(
            "firstname"=>$form_data["firstname"],
            "lastname"=>$form_data['lastname'],
            "update_time"=>date('Y-m-d H:i:s')
        );

        $this->load->model('Users');
        $this->Users->updateCurrentUserFields($id,$data);
        $this->profile();
    }

    public function logout(){
        session_destroy();
        redirect('user/login');
    }

    public function deactivate(){
        $id = $_SESSION["user_id"];
        session_destroy();
        $this->load->model("Users");
        $this->Users->deactivateUser($id);
        session_destroy();
        redirect('user/register');
        // echo "User deactiveated, please contact admin to activate again or register<br>";
        

    }

    public function registerSuperAdmin(){

    }

    public function loginSuperAdmin(){

    }

    
}