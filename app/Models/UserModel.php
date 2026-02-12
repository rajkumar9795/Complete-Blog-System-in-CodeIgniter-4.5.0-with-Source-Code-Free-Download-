<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model 
{
	
	
	 protected $table = 'adminmaster';
    protected $primaryKey = 'ID';

    protected $allowedFields = ['Username', 'Pass'];
    protected $returnType = 'array';
}