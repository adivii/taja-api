<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model {
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $allowedFields = ['first_name', 'last_name', 'username'];
    protected $validationRules = [
        'first_name'=>'required',
        'last_name'=>'required',
        'username'=>'required'
    ];
    protected $validationMessages = [
        'first_name'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'last_name'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'username'=>[
            'required'=>'Silakan Masukkan Input'
        ]
        ];
}