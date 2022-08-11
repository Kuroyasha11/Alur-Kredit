<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['applicant'];

    // public function applicant()
    // {
    //     return $this->hasOne(Applicant::class);
    // }

    public static function getArchiveByApplicantId($id)
    {
        return Archive::where('applicant_id', $id)->get();
    }
}
