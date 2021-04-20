<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Apartment;
use App\User;
use App\Service;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        $users = Auth::user();
        // dd($users);
        return view('Apartments.dashboard', compact('apartments','users')) ;
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

        return redirect()->route('apartments.edit', compact('apartment', 'services'));

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


    }

}
