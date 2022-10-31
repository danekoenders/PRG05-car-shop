<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Car;

class carController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show'); // Checkt of user admin is anders mag hij geen fucntionaliteiten behalve index en show.
        $this->middleware('auth'); // Checkt of user uberhaubt ingelogd is anders mag hij er helemaal niet in.
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = car::all();
        return view('car', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand'=>'required',
            'model'=>'required',
            'price'=>'required|numeric|min:10000|max:500000'
        ]);

        $car = new Car();

        $car->user_id = \Auth::id();
        $car->brand = request('brand');
        $car->model = request('model');
        $car->engine = request('engine');
        $car->transmission = request('transmission');
        $car->options = request('options');
        $car->price = request('price');

        $car->save();

        return redirect()->route('admin')->with(['message'=> 'Car Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::find($id);
        return view('show',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = car::find($id);
        return view('edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand'=>'required',
            'model'=>'required',
            'price'=>'required|numeric|min:10000|max:500000'
        ]);

        $car = car::find($id);

        $car->brand = request('brand');
        $car->model = request('model');
        $car->engine = request('engine');
        $car->transmission = request('transmission');
        $car->options = request('options');
        $car->price = request('price');

        $car->save();

        return redirect()->route('admin')->with(['message'=> 'Updated Car']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $car = car::find($id);
        $car->delete();

        return redirect()->route('admin')->with(['message'=> 'Deleted Car']);
    }
}
