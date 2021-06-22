<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Roles;
 
class AddUser extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $session = session();
        $model = new UserModel();
        $rolemodel = new Roles();
        $email = $session->get('user_email');
        $data = $model->SingleUserData($email);
        $data['role_ids'] = $rolemodel->roleids();
        $data['role_names'] = $rolemodel->rolenames();
        echo view('adduser', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]',
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $this->request->getVar('name'),
                'user_email'    => $this->request->getVar('email'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role_id'    => $this->request->getVar('userrole'),
            ];
            $model->save($data);
            return redirect()->to('/adduser');
        }else{
            $data['validation'] = $this->validator;
            echo view('adduser', $data);
        }
         
    }
 
}