<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class EditProfile extends Controller
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
            $data['user_age'] = '';
        }
        if($data['user_mobile'] == 0 || $data['user_mobile'] == '')
        {
            $data['user_mobile'] = '';
        }
        echo view('editprofile',$data);
    } 

    public function update()
    {
        $session = session();
        $id = $session->get('user_id');
        $model = new UserModel();
        $email = $session->get('user_email');
        $data = $model->SingleUserData($email);
        if($data['user_age'] == 0 || $data['user_age'] == '')
        {
            $data['user_age'] = '';
        }
        if($data['user_mobile'] == 0 || $data['user_mobile'] == '')
        {
            $data['user_mobile'] = '';
        }
        //include helper form
        helper(['form']);
        //set rules validation form
        //max_dims[userfile,600,600]| for image to be only square
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'age'           => 'permit_empty|decimal|min_length[1]|max_length[3]',
            'mobile'        => 'permit_empty|decimal|exact_length[10]',
            'userfile'      => 'uploaded[userfile]|max_size[userfile,300]|mime_in[userfile,image/jpg,image/jpeg,image/png]',
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $file = $this->request->getFile('userfile');
            $data = $model->SingleUserData($email);

            
            if($data['file_name'] == '')
            {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['file_name'] = $newName;
            }
            else
            {
                $newName = $data['file_name'];
                // unlink(ROOTPATH.'public/uploads/'.$newName);
                // $file->move(WRITEPATH . 'uploads', $newName);
                move_uploaded_file($file, WRITEPATH . 'uploads/'. $newName );
            }
            $data = [
                'user_name'   => $this->request->getVar('name'),
                'user_age'    => $this->request->getVar('age'),
                'user_mobile' => $this->request->getVar('mobile'),
            ];
            $model->update($id,$data);
            return redirect()->to('/dashboard');
        }else{
            $data['validation'] = $this->validator;
            echo view('editprofile', $data);
        }
         
    }
}