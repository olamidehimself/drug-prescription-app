<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function getPatients()
    {
        $doctor = auth()->user()->doctor;

        $patients = Patient::where('doctor_id', $doctor->id)->get();

        return response()->json($patients, 200);
    }

    public function addPrescription(Request $request, $patient_id)
    {
        $doctor = auth()->user()->doctor;

        Prescription::create([
            'prescription' => $request->prescription,
            'patient_id' => $patient_id,
            'doctor_id' => $doctor->id,
            'usage' => $request->usage,
            'duration' => $request->duration,
            'notes' => $request->string
        ]);
    }

    public function getPrescription($id)
    {
        $doctor = auth()->user()->doctor;
        $prescription = Prescription::where('patient_id', $id)->where('doctor_id', $doctor->id)->get();

        return response()->json($prescription, 200);
    }
}
