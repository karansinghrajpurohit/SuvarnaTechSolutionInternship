<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['user_id','user_name','user_email','user_password','user_age','user_mobile','file_name','role_id'];
    protected $primaryKey = 'user_id';

    public function SingleUserData($email)
    {
        // return $this->where('user_email', $email)->first();
        return $this->join('roles', 'roles.role_id = user.role_id')->where('user_email', $email)->first();
    }
}