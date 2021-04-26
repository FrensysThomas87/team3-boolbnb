<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Support\Facades\DB;


class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return redirect()->route('public.apartments.index') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('Apartments.create', compact('services'));
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

        $address = $request->address;
        // dd($address);
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $address . '.json?limit=1&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr')->json();
        $lat = $response['results'][0]['position']['lat'];
        $lon = $response['results'][0]['position']['lon'];

        $this->validateForm($request);

        $apartment = new Apartment();

        $apartment->fill($data);

        $apartment->profile_pic = $path;
        $apartment->visible = $visible;
        $apartment->user_id = $auth;
        $apartment->latitude = $lat;
        $apartment->longitude = $lon;
        $apartment->save();
        $apartment->services()->attach($data['service_name']);

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
        return redirect()->route('public.apartments.show', $apartment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('Apartments.edit', compact('apartment', 'services'));

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
        //si fa una query alla tabella apartment con la relazione servizi
        // si chiede l'appartamento comprensivo di servizi corrispondente all'id dell'appartmento che si sta modificando
        $apartmentServices = Apartment::with('services')
                ->where('id', '=', $apartment->id)
                ->get();
        //____________________________________________________

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

        // si ciclano i servizi passati dal form nella request(arrivati poi nei data)
        // si cicla l'array dei servizi ricevuti dalla query(fatta all'inizio)
        // si confrontano i servizi dell'appartmento esistente (quello ottenuto dalla query) con i servizi passati nel form Edit
        // se i due servizi combaciano allora il serivio viene rimosso dai data.
        foreach ($data['service_name'] as $key => $service) {
            foreach ($apartmentServices[0]->services as $key => $apartmentService){
                if ($service == $apartmentService->id) {

                    unset($data['service_name'][$key]);
                };
            };
        };


        $address = $request->address;

        // dd($address);
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $address . '.json?limit=1&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr')->json();
        $lat = $response['results'][0]['position']['lat'];
        $lon = $response['results'][0]['position']['lon'];

        $this->validateForm($request);
        $apartment->profile_pic = $path;
        $apartment->visible = $visible;
        $apartment->latitude = $lat;
        $apartment->longitude = $lon;
        $apartment->update($data);
        $apartment->services()->attach($data['service_name']);


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

        $apartment->services()->detach();
        $apartment->delete();
        return redirect()->route('dashboard');

    }

    protected function validateForm(Request $request){
        $request->validate([
            'title' => 'required | max:400',
            'description' => 'max:10000',
            'rooms' => 'required | integer | between:1,20',
            'beds' => 'required | integer | between:1,80',
            'baths' => 'required | integer | between:1,10',
            'sq_meters' => 'required | integer | between:1,1000',
            'price' => 'required | numeric | between: 1, 10000',
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
