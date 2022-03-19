<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'tgl_lahir', 'tmpt_lahir', 'gender'];
    protected $session = ['name', 'tgl_lahir', 'tmpt_lahir', 'gender'];
}