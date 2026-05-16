<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    protected $fillable = [

        'user_id',

        'basic_salary',

        'hra',

        'allowance',

        'deduction',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}