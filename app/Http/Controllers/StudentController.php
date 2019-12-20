<?php

namespace App\Http\Controllers;

use App\Services\SessionService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function generateSchedualer(Request $request, SessionService $service)
    {
        $validatedData = $this->validate($request,[
            'start_date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'chosen_days' => 'required|array',
            'chosen_days.*' => 'integer|between:1,7',
            'sessions_count' => 'required|integer'
        ]);

        $response = $service->scheduale(
            $validatedData['start_date'],
            $validatedData['chosen_days'],
            $validatedData['sessions_count'],
            30
        );

        return response()->json([
            'data' => $response
        ]);
    }
}
