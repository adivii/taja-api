<?php

namespace App\Models;
use CodeIgniter\Model;

class Account_model extends Model {
    protected $table = "account";
    protected $primaryKey = "id";
    protected $allowedFields = ['username', 'password', 'role'];
    protected $validationRules = [
        'username'=>'required',
        'password'=>'required',
        'role'=>'required'
    ];
    protected $validationMessages = [
        'username'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'password'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'role'=>[
            'required'=>'Silakan Masukkan Input'
        ]
        ];
}