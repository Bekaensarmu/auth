<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Witness extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'witnessID',
        'name',
        'address',
        'state',
        'attorneyWitness',
        'Description',
        'accusedWitness',
        'attoneyID',
        'caseChargedID',
    ];

    protected $searchableFields = ['*'];

    public function caseHearings()
    {
        return $this->hasMany(CaseHearing::class);
    }
}
