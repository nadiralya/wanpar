<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
	public function index()
	{
		$model = new StudentModel();
		$data ['student'] = $model->orderBy('id', 'ASC')->findAll();
        return view ('student/view', $data);
	}

	public function add ()
	{
		$this->session = \Config\Services::session();
		if(!isset($_SESSION['inputs'])) {
			$data = array(
			'name' => '',
			'tgl_lahir' => '',
			'tmpt_lahir' => '',
			'gender' => '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('/student/create');
	}
	
	public function save ()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$data = array(
			'name' => $this->request->getPost('name'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'tmpt_lahir' => $this->request->getPost('tmpt_lahir'),
			'gender' => $this->request->getPost('gender'),
		);

		if($validation->run($data, 'student')){
			$model = new StudentModel();
			$model->insert($data);
			session()->setFlashdata('success', 'Berhasil menyimpan student ' . $this->request->getPost('student'));
			return redirect()->to(base_url('student'));
		}else{
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('/student/add'));
		}
	}

	public function edit($id) {
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
				'name' => '',
				'tgl_lahir' => '',
				'tmpt_lahir' => '',
				'gender' => '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new StudentModel();
		$data['student'] = $model->where('id',$id) ->first();
		return view('/student/edit',$data);
	}

	public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'name' => $this->request->getPost('name'),
			'tgl_lahir' => $this->request->getPost('tgl_lahir'),
			'tmpt_lahir' => $this->request->getPost('tmpt_lahir'),
			'gender' => $this->request->getPost('gender'),
        );

        if($validation->run($data, 'student')) {
            $model = new StudentModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil update student' . $this->request->getPost('student'));
            return redirect()->to(base_url('student'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/student/edit/'));
        }
	}

	
	public function delete($id)
	{
		$model = new StudentModel(); 
		$model->where('id', $id)->delete();
		session()->setFlashdata('success', 'Berhasil delete student ');
		return redirect()->to(base_url('/student'));
	}
}