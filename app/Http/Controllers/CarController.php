<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return CarResource::collection($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->name = $request->name;
        $car->type = $request->type;
        if($car->save())
        {
            return new CarResource($car);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->name = $request->name;
        $car->type = $request->type;
        if($car->save())
        {
            return new CarResource($car);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if($car->delete())
        {
            return new CarResource($car);
        }
    }
    
    public function displayFirstCarWithBigTypeWithUppercase()
    {
        $car = Car::where('type', 'big')->first();
        return strtoupper($car);
    }

    public function displayFirstCarWithBigTypeWithLowercase()
    {
        $car = Car::where('type', 'big')->first();
        return strtolower($car);
    }
    
    public function deleteFirstCarWithBigType()
    {
        $car = Car::where('type', 'big')->firstOrFail();
        if($car->delete())
        {
            return new CarResource($car);
        }
    }
}
