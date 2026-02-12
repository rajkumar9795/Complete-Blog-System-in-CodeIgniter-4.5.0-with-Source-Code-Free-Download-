<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'ID';

    protected $allowedFields = ['ID', 'Heading', 'BlogText', 'Ext', 'RCount', 'CreatedDate', 'UpdatedDate', 'RStatus'];
    protected $returnType = 'array';
}
