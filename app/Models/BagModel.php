<?php

namespace App\Models;

use CodeIgniter\Model;

class BagModel extends Model
{
    protected $table = 'bags';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'harga', 'stok'];
    protected $session = ['nama', 'harga', 'stok'];
}