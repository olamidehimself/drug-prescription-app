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
}
