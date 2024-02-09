<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrar extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'MIDNumber',
        'Rank',
        'Name',
        'fieldType',
        'address',
        'city',
        'state',
        'courtID',
        'court_id',
    ];

    protected $searchableFields = ['*'];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function caseCharges()
    {
        return $this->hasMany(CaseCharge::class);
    }
}
