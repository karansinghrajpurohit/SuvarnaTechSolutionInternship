<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\Roles;
 
class AddRole extends Controller
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
        $data['role_names'] = $rolemodel->rolenames();
        echo view('addrole', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'rolename'          => 'required',
        ];
         
        if($this->validate($rules)){
            $rolemodel = new Roles();
            $data = [
                'role_name'    => $this->request->getVar('rolename'),
            ];
            $rolemodel->save($data);
            return redirect()->to('/addrole');
        }else{
            $data['validation'] = $this->validator;
            echo view('addrole', $data);
        }
         
    }
 
}