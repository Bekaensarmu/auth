<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseCharge extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'modID',
        'MIDnumber',
        'rank',
        'fullName',
        'address',
        'state',
        'crimeType',
        'crimeDate',
        'chargeDate',
        'mod_id',
        'mod_employee_id',
        'registrar_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'case_charges';

    protected $casts = [
        'crimeDate' => 'datetime',
        'chargeDate' => 'datetime',
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }

    public function modEmployee()
    {
        return $this->belongsTo(ModEmployee::class);
    }

    public function registrar()
    {
        return $this->belongsTo(Registrar::class);
    }
}
