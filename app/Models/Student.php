<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'employee'; // Assuming 'employees' is the correct table name
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'e_id',
        'phone',
        'city',
        'resume', // Assuming 'resume' is the correct field name for storing the file path
    ];
}
