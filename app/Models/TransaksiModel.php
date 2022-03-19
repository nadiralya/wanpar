<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'tgl_lahir', 'tmpt_lahir', 'gender'];
    protected $session = ['name', 'tgl_lahir', 'tmpt_lahir', 'gender'];
}