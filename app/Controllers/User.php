<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;

class User extends BaseController
{
    use ResponseTrait;

    function __construct(){
        $this->model = new User_model();
    }

    public function index()
    {
        $data = $this->model->orderBy('id_user', 'asc')->findAll();
        return $this->respond($data, 200);
    }

    public function show($uname = NULL){
        $data = $this->model->where('username', $uname)->findAll();
        if($data){
            return $this->respond($data, 200);
        }else{
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function create(){
        // $data = [
        //     'first_name'=>$this->request->getVar('password'),
        //     'last_name'=>$this->request->getVar('role')
        //     'username'=>$this->request->getVar('username'),
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

    public function update($uname = null){
        $data = $this->request->getRawInput();
        $data['username'] = $uname;

        $isExists = $this->model->where('username', $uname)->findAll(); 

        if(!$isExists){
            return $this->failNotFound("Data tidak ditemukan");
        }else{
            $data['id_user'] = $isExists[0]['id_user'];
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

    public function delete($uname = null){
        $data = $this->model->where('username', $uname)->findAll();

        if($data){
            $this->model->delete($data[0]['id_user']);

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
