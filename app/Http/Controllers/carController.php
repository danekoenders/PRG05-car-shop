<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Http\Response;

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

        if ($car->status === 0) {
            abort(Response::HTTP_FORBIDDEN);
        } else {
            return view('show', compact('car'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = car::find($id);

        if ($car->user_id !== \Auth::id()) {
            abort(Response::HTTP_FORBIDDEN);
        } else {
            return view('edit', compact('car'));
        }
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

        if ($car->user_id !== \Auth::id()) {
            abort(Response::HTTP_FORBIDDEN);
        } else {
            $car->brand = request('brand');
            $car->model = request('model');
            $car->engine = request('engine');
            $car->transmission = request('transmission');
            $car->options = request('options');
            $car->price = request('price');

            $car->save();

            return redirect()->route('admin')->with(['message'=> 'Updated Car']);
        }
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

        if ($car->user_id !== \Auth::id()) {
            abort(Response::HTTP_FORBIDDEN);
        } else {
            $car->delete();

            return redirect()->route('admin')->with(['message'=> 'Deleted Car']);
        }
    }

    public function filter(Request $request)
    {
        $filter_term = $request->query('brand');

        $cars = Car::where('brand', 'like', '%' . $filter_term . '%')->get();

        return view('car', compact('cars'));
    }

    public function search(Request $request)
    {
        $search_term = $request->query('text');

        $cars = Car::where('brand', 'like', '%' . $search_term . '%')
            ->orWhere('model', 'like', '%' . $search_term . '%')
            ->orWhere('engine', 'like', '%' . $search_term . '%')
            ->orWhere('transmission', 'like', '%' . $search_term . '%')
            ->orWhere('options', 'like', '%' . $search_term . '%')
            ->orWhere('price', 'like', '%' . $search_term . '%')->get();

        return view('car', compact('cars'));
    }
}
