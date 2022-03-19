<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'id';
    protected $allowedFields = ['grade', 'subjects', 'subject_hours'];
    protected $session = ['grade', 'subjects', 'subject_hours'];
}