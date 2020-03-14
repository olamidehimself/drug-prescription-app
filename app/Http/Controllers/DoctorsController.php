<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Prescription;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function getPatients()
    {
        $doctor = auth()->user()->doctor;

        $patients = Patient::all();

        return response()->json($patients, 200);
    }

    public function addPrescription(Request $request)
    {
        $doctor = auth()->user()->doctor;

        $prescription = Prescription::create([
            'prescription' => $request->prescription,
            'patient_id' => $request->patient_id,
            'doctor_id' => $doctor->id,
            'usage' => $request->usage,
            'duration' => $request->duration,
            'notes' => $request->notes
        ]);

        return response()->json($prescription, 200);
    }

    public function getPrescription($id)
    {
        $doctor = auth()->user()->doctor;
        $prescription = Prescription::where('patient_id', $id)->where('doctor_id', $doctor->id)->get();
        $patient = Patient::find($id);

        return response()->json($prescription, 200);
    }

    public function patientInfo($id)
    {
        $patient = Patient::find($id);

        return response()->json($patient);
    }

    public function deletePrescription($id)
    {
        Prescription::destroy($id);
        // $doctor = auth()->user()->doctor;
        // $prescription = Prescription::where('patient_id', $patientID)->where('doctor_id', $doctor->id)->get();

        // return response()->json($prescription, 200);

    }
}
