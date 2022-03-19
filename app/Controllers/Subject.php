<?php

namespace App\Controllers;

use App\Models\SubjectModel;

class Subject extends BaseController
{
	public function index()
	{
		$model = new SubjectModel();
		$data ['subject'] = $model->orderBy('id', 'ASC')->findAll();
        return view ('subject/view', $data);
	}

	public function add ()
	{
		$this->session = \Config\Services::session();
		if(!isset($_SESSION['inputs'])) {
			$data = array(
			'subjects' => '',
			'subject_hours' => '',
			);
			session()->setFlashdata('inputs', $data);
		}
		return view ('subject/create');
	}
	
	public function save ()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$data = array(
			'subjects' => $this->request->getPost('subjects'),
			'subject_hours' => $this->request->getPost('subject_hours'),
		);

		if($validation->run($data, 'subject')){
			$model = new SubjectModel();
			$model->insert($data);
			session()->setFlashdata('success', 'Berhasil menyimpan mapel ' . $this->request->getPost('subject'));
			return redirect()->to(base_url('subject'));
		}else{
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('/subject/add'));
		}
	}

	public function edit($id) {
		$this->session= \Config\Services::session();
		if(!isset($_SESSION['inputs'])){
			$data = array(
			'subjects'=> '',
			'subject_hours'=>  '',
			);
			session()->setFlashdata('inputs', $data);
		}
		$model = new SubjectModel();
		$data['subject'] = $model->where('id',$id) ->first();
		return view('/subject/edit',$data);
	}

	public function update() 
	{
		helper(['form', 'url']);
        $id = $this->request->getPost('id') ;
        $validation = \Config\Services::validation();
        $data = array(
            'subjects' => $this->request->getPost('subjects'),
            'subject_hours' => $this->request->getPost('subject_hours'),
        );

        if($validation->run($data, 'subject')) {
            $model = new SubjectModel();
            $model->update($id, $data);
            session()->setFlashdata('success', 'Berhasil update mapel' . $this->request->getPost('subject'));
            return redirect()->to(base_url('subject'));
        }else{
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('/subject/edit/'));
        }
	}

	
	public function delete($id)
	{
		$model = new SubjectModel(); 
		$model->where('id', $id)->delete();
		session()->setFlashdata('success', 'Berhasil delete mapel ');
		return redirect()->to(base_url('/subject'));
	}
}