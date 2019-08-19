<?php

namespace App\Http\Controllers;

use App\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cartypes = CarType::paginate(15);
    return view('settings.cartypes.index',compact('cartypes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('settings.cartypes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    CarType::create($request->all());
    return redirect()->route('cartypes.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\CarType  $cartype
   * @return \Illuminate\Http\Response
   */
  public function show(cartype $cartype)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\CarType  $cartype
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $cartype = CarType::findOrFail($id);
    return view('settings.cartypes.edit', compact('cartype')) ;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\CarType  $cartype
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    CarType::findOrFail($id)->update($request->all());
    return redirect()->route('cartypes.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\CarType  $cartype
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    CarType::findOrFail($id)->delete();
    return redirect()->route('cartypes.index');
  }
}
