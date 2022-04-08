<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pembeli', 'id_barang', 'jumlah', 'total_harga'];
    protected $session = ['id_pembeli', 'id_barang', 'jumlah', 'total_harga'];
}