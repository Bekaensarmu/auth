<?php

namespace App\Http\Controllers\Api;

use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaseChargeResource;
use App\Http\Resources\CaseChargeCollection;

class RegistrarCaseChargesController extends Controller
{
    public function index(
        Request $request,
        Registrar $registrar
    ): CaseChargeCollection {
        $this->authorize('view', $registrar);

        $search = $request->get('search', '');

        $caseCharges = $registrar
            ->caseCharges()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaseChargeCollection($caseCharges);
    }

    public function store(
        Request $request,
        Registrar $registrar
    ): CaseChargeResource {
        $this->authorize('create', CaseCharge::class);

        $validated = $request->validate([
            'modID' => ['required', 'max:255', 'string'],
            'MIDnumber' => ['required', 'max:255', 'string'],
            'rank' => ['required', 'max:255', 'string'],
            'fullName' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'crimeType' => ['required', 'max:255', 'string'],
            'crimeDate' => ['required', 'date'],
            'chargeDate' => ['required', 'date'],
            'mod_id' => ['required', 'exists:mods,id'],
            'mod_employee_id' => ['required', 'exists:mod_employees,id'],
        ]);

        $caseCharge = $registrar->caseCharges()->create($validated);

        return new CaseChargeResource($caseCharge);
    }
}
