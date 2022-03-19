<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'harga', 'stok'];
    protected $session = ['nama', 'harga', 'stok'];
}