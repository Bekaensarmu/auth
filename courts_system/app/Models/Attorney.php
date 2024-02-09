<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attorney extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'courtID',
        'attoneyID',
        'fullname',
        'courtType',
        'address',
        'state',
        'empType',
        'court_id',
        'description',
    ];

    protected $searchableFields = ['*'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function caseHearings()
    {
        return $this->hasMany(CaseHearing::class);
    }
}
