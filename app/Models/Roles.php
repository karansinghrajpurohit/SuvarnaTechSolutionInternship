<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Roles extends Model{
    protected $table = 'roles';
    protected $allowedFields = ['role_id','role_name'];
    protected $primaryKey = 'role_id';

    public function roleids()
    {
        // return $this->where('user_email', $email)->first();
        return $this->findColumn('role_id');
    }

    public function rolenames()
    {
        // return $this->where('user_email', $email)->first();
        return $this->findColumn('role_name');
    }
}