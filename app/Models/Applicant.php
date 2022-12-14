<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['analyst'];

    public function analyst()
    {
        return $this->hasOne(Analyst::class);
    }
}
