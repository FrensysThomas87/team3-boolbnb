<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('Apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $auth = Auth::id();
        $data = $request->all();



        if($request->file('profile_pic')){
            $path = $request->file('profile_pic')->store('images');
        } else{
            $path="";
        }

        if($request->visible) {
            $visible = $request->visible;
        } else {
            $visible = 'false';
        }

        $this->validateForm($request);

        $apartment = new Apartment();



        $apartment->fill($data);



        $apartment->profile_pic = $path;
        $apartment->visible = $visible;
        $apartment->user_id = $auth;
        $apartment->save();

        // Redirect
        $apartmentStored = Apartment::orderBy('id','desc')->first();
        return redirect()->route('apartments.show',$apartmentStored);
    }

    /**
     * Display the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('Apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('Apartments.edit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {

        if($request->file('profile_pic')){
            $path = $request->file('profile_pic')->store('images');
        } else{
            $path="";
        }

        if($request->visible) {
            $visible = $request->visible;
        } else {
            $visible = 'false';
        }

        $data = $request->all();

        $this->validateForm($request);
        $apartment->profile_pic = $path;
        $apartment->visible = $visible;
        $apartment->update($data);


        return redirect()->route('apartments.show',compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Apartment apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index');
    }

    protected function validateForm(Request $request){
        $request->validate([
            'title' => 'required | max:400',
            'description' => 'max:10000',
            'rooms' => 'required | integer | between:1,20',
            'beds' => 'required | integer | between:1,80',
            'baths' => 'required | integer | between:1,10',
            'sq_meters' => 'required | integer | between:1,1000',
            'price' => 'required | numeric | between: 1, 1000',
            'visible' => 'max:5',
            'check_in' => 'max:2048',
            'check_out' => 'max:2048',
            'max_guests' => 'required | integer | between:1,50',
             //'view_count' => generato dal sistema
            'profile_pic' => 'max:2048',
            'address' => 'max:2048'
             //'latitude' => generato dal sistema
             //'longitude' => generato dal sistema
        ]);

    }

}
