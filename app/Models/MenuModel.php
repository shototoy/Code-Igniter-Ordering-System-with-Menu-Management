<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item', 'description', 'price'];
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
}