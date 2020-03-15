<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function myPrescriptions()
    {
        $patient = auth()->user()->patient;

        $prescriptions = Prescription::where('patient_id', $patient->id)->get();

        return response()->json($prescriptions, 200);
    }

    public function complete(Request $request, $prescriptionID)
    {
        $patient = auth()->user()->patient;

        $old_pres = Prescription::where('id', $prescriptionID)->where('patient_id', $patient->id)->first();
        Prescription::where('id', $old_pres->id)->update([
            'completed' => $old_pres->completed == true ? false : true,
        ]);

        $prescriptions = Prescription::where('patient_id', $patient->id)->get();

        return response()->json($prescriptions, 200);
    }
}
