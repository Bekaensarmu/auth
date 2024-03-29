<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModEmployee extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'modID',
        'EmpID',
        'rank',
        'fullName',
        'address',
        'state',
        'empType',
        'mod_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'mod_employees';

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }

    public function caseCharges()
    {
        return $this->hasMany(CaseCharge::class);
    }
}
