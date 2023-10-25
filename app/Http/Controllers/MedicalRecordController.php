<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalRecordController extends Controller
{
    public function create()
    {
        return view('add-record')->with([
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),
        ]);
    }

    public function index()
    {
        return view('dashboard.records')->with('records', MedicalRecord::when(request('doctor') != null, function($query) {
            $query->where('doctor_id', request('doctor'));
        })->when(request('patient') != null, function($query) {
            $query->where('patient_id', request('patient'));
        })->get());
    }

    public function store(Request $request)
    {
        // dd($request);
        
        $request->validate([
            'health_condition' => 'required',
            'temperature' => 'required',
            'prescription_img' => 'required|mimes:jpg,png,jpeg|max:2048',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        // dd($request);

        $medical_record = MedicalRecord::create([
            'health_condition' => $request->health_condition,
            'temperature' => floatval($request->temperature),
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
        ]);

        $path = Storage::put('public/images', $request->prescription_img);
        $medical_record->prescription_img = url(Storage::url($path));
        $medical_record->save();

        return redirect('records')->with('success', 'Succesfully Added Record!');
    }
}
