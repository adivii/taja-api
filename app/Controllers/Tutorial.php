<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\Tutorial_model;

class Tutorial extends BaseController
{
    use ResponseTrait;

    function __construct(){
        $this->model = new Tutorial_model();
    }

    public function index()
    {
        $data = $this->model->orderBy('date', 'asc')->findAll();
        
        return $this->respond($data, 200);
    }

    public function show($id = NULL){
        $data = $this->model->where('id', $id)->findAll();
        if($data){
            return $this->respond($data, 200);
        }else{
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function create(){
        // $data = [
        //     'username'=>$this->request->getVar('username'),
        //     'password'=>$this->request->getVar('password'),
        //     'role'=>$this->request->getVar('role')
        // ];

        $data = $this->request->getPost();
        // $this->model->save($data);

        if(!$this->model->save($data)){
            return $this->fail($this->model->errors());
        }

        $response = [
            'status'=>201,
            'error'=>null,
            'messages'=>[
                'success'=>'Sukses Input'
            ]
        ];

        return $this->respond($response);
    }

    public function update($id = null){
        $data = $this->request->getRawInput();
        $data['id'] = $id;

        $isExists = $this->model->where('id', $id)->findAll(); 

        if(!$isExists){
            return $this->failNotFound("Data tidak ditemukan");
        }

        if(!$this->model->save($data)){ // Kalau ada error saat menyimpan
            return $this->fail($this->model->errors());
        }

        $response = [
            'status'=>200,
            'error'=>NULL,
            'messages'=>[
                'success'=>"Update Sukses"
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id = null){
        $data = $this->model->where('id', $id)->findAll();

        if($data){
            $this->model->delete($id);

            $response = [
                'status'=>200,
                'error'=>null,
                'messages'=>[
                    'success'=>"Hapus Berhasil"
                ]
            ];

            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound("Data tidak ditemukan");
        }
    }
}
