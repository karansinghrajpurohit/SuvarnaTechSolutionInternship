<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Dashboard extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $model = new UserModel();
        $email = $session->get('user_email');
        $data = $model->SingleUserData($email);
        if($data['user_age'] == 0 || $data['user_age'] == '')
        {
            $data['user_age'] = '-';
        }
        if($data['user_mobile'] == 0 || $data['user_mobile'] == '')
        {
            $data['user_mobile'] = '-';
        }
        if($data['file_name'] == '')
        {
            $data['file_name'] = '/CodeIgniter/public/Images/DefaultProfile.jpg';
        }
        else
        {
            $data['file_name'] = '/CodeIgniter/public/uploads/'.$data['file_name'];
        }
        echo view('dashboard',$data);
    }
}