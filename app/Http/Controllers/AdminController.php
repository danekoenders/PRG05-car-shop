<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); // Checkt of user admin is
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = car::all();
        return view('admin', compact('cars'));
    }

    /**
     * Update the status of the car.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request)
    {
        $request->validate([
            'status'=>'boolean'
        ]);

        $car = car::find(request('id'));

        $car->status = request('status');

        $car->save();

        return redirect()->route('admin')->with(['message'=> 'Updated Car']);
    }
}
