<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Transaksi extends BaseController
{
	public function index()
	{
		$model = new ProductModel();
		$data ['transaksi'] = $model->orderBy('id', 'ASC')->findAll();
        return view ('transaksi/view', $data);
	}

	public function tambah ()
	{
		$this->session = \Config\Services::session();
		if(!isset($_SESSION['inputs'])) {
			$data = array(
			'id_pembeli' => '',
			'id_barang' => '',
			'jumlah' => '',
			'total_harga' => '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('transaksi/create');
	}
	
	public function save ()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$data = array(
			'id_pembeli' => $this->request->getPost('id_pembeli'),
			'id_barang' => $this->request->getPost('id_barang'),
			'jumlah' => $this->request->getPost('jumlah'),
			'total_harga' => $this->request->getPost('total_harga'),
		);

		if($validation->run($data, 'transaksi')){
			$model = new ProductModel();
			$model->insert($data);
			session()->setFlashdata('success', 'Berhasil menyimpan transaksi ' . $this->request->getPost('transaksi'));
			return redirect()->to(base_url('transaksi'));
		}else{
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('/transaksi/tambah'));
		}
	}

	public function edit($id) {
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'nama'=> '',
			'harga'=> '',
			'stok'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new ProductModel();
		$data['transaksi'] = $model->where('id',$id) ->first();
		return view('/transaksi/edit',$data);
	}

	public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        );

        if($validation->run($data, 'transaksi')) {
            $model = new ProductModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil update transaksi' . $this->request->getPost('transaksi'));
            return redirect()->to(base_url('transaksi'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/transaksi/edit/'));
        }
	}

	
	public function hapus($id)
	{
		$model = new ProductModel(); 
		$model->where('id', $id)->delete();
		session()->setFlashdata('success', 'Berhasil delete transaksi ');
		return redirect()->to(base_url('/transaksi'));
	}

}