<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
                'patient_name' => 'required|string|max:255',
                'doctor_name' => 'required|string|max:255',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'reason' => 'required|string',
                'status' => 'sometimes|string|in:Pendiente,Realizada,Cancelada'
            ]);

        $appointment = Appointment::create($data);
        return response()->json($appointment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment, 200);
    }

    public function update(Request $request, string $id)
    {
        $appointment = Appointment::findOrFail($id);
            
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'reason' => 'required|string',
            'status' => 'sometimes|string|in:Pendiente,Realizada,Cancelada'
        ]);

        $appointment->update($validated);
        return response()->json($appointment, 200);
    }

    public function destroy(string $id)
    {
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();
            
    return response()->json([
        'message' => 'Cita eliminada correctamente.'
    ], 200);
}
}
