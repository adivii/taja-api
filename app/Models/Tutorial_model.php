<?php

namespace App\Models;
use CodeIgniter\Model;

class Tutorial_model extends Model {
    protected $table = "tutorial";
    protected $primaryKey = "id";
    protected $allowedFields = ['title', 'place', 'date'];
    protected $validationRules = [
        'title'=>'required',
        'place'=>'required',
        'date'=>'required'
    ];
    protected $validationMessages = [
        'title'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'place'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'date'=>[
            'required'=>'Silakan Masukkan Input'
        ]
        ];
}