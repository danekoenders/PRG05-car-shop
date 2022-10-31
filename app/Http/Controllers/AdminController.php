<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request, $id)
    {
        $request->validate([
            'status'=>'boolean'
        ]);

        $car = car::find($id);

        $car->status = request('status');

        $car->save();

        return redirect()->route('admin')->with(['message'=> 'Updated Car']);
    }
}
