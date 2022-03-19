<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
	public function index()
	{
		$model = new ProductModel();
		$data ['products'] = $model->orderBy('id', 'ASC')->findAll();
        return view ('products/view', $data);
	}

	public function tambah ()
	{
		$this->session = \Config\Services::session();
		if(!isset($_SESSION['inputs'])) {
			$data = array(
			'nama' => '',
			'harga' => '',
			'stok' => '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('products/create');
	}
	
	public function save ()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$data = array(
			'nama' => $this->request->getPost('nama'),
			'harga' => $this->request->getPost('harga'),
			'stok' => $this->request->getPost('stok'),
		);

		if($validation->run($data, 'products')){
			$model = new ProductModel();
			$model->insert($data);
			session()->setFlashdata('success', 'Berhasil menyimpan products ' . $this->request->getPost('products'));
			return redirect()->to(base_url('products'));
		}else{
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('/products/tambah'));
		}
	}

	public function edit($id) {
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'grade'=> '',
			'capacity'=> '',
			'amount'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new ProductModel();
		$data['products'] = $model->where('id',$id) ->first();
		return view('/products/edit',$data);
	}

	public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'grade' => $this->request->getPost('grade'),
            'capacity' => $this->request->getPost('capacity'),
            'amount' => $this->request->getPost('amount'),
        );

        if($validation->run($data, 'products')) {
            $model = new ProductModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil update products' . $this->request->getPost('products'));
            return redirect()->to(base_url('products'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/products/edit/'));
        }
	}

	
	public function hapus($id)
	{
		$model = new ProductModel(); 
		$model->where('id', $id)->delete();
		session()->setFlashdata('success', 'Berhasil delete products ');
		return redirect()->to(base_url('/products'));
	}

}