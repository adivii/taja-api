<?php

namespace App\Models;
use CodeIgniter\Model;

class Event_model extends Model {
    protected $table = "event";
    protected $primaryKey = "id";
    protected $allowedFields = ['event_title', 'event_place', 'event_date'];
    protected $validationRules = [
        'event_title'=>'required',
        'event_place'=>'required',
        'event_date'=>'required'
    ];
    protected $validationMessages = [
        'event_title'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'event_place'=>[
            'required'=>'Silakan Masukkan Input'
        ],
        'event_date'=>[
            'required'=>'Silakan Masukkan Input'
        ]
        ];
}