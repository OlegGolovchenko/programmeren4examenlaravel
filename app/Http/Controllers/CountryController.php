<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = \App\Country::all();
        return view('country.editing',['countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = \App\Country::all();
        return view('country.insertingone',['countries'=>$countries,'feedback'=>""]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'Name' => 'required|unique:country|min:1|max:255',
        'Latitude' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        'Longitude' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        'Code' => 'required|alpha|unique:country|min:2|max:2',
        'ShippingCostMultiplier' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        ]);
        $ctr = new \App\Country();
        $ctr->Name = $request->input('Name');
        $ctr->Latitude = empty($request->input('Latitude'))?null:$request->input('Latitude');
        $ctr->Longitude = empty($request->input('Longitude'))?null:$request->input('Longitude');
        $ctr->Code = $request->input('Code');
        $ctr->ShippingCostMultiplier = empty($request->input('ShippingCostMultiplier'))?null:$request->input('ShippingCostMultiplier');
        if(!$ctr->save()){
            $countries = \App\Country::all();
            return view('country.insertingone',['countries'=>$countries,'feedback'=>"mislukt"]);
        }else{
            $countries = \App\Country::all();
            return view('country.insertingone',['countries'=>$countries,'feedback'=>"opgeslagen"]);
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
        $country = \App\Country::find($id);
        $countries = \App\Country::all();
        return view('country.readingone',['countries'=>$countries,'feedback'=>"",'cont'=>$country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = \App\Country::find($id);
        $countries = \App\Country::all();
        return view('country.updatingone',['countries'=>$countries,'feedback'=>"",'cont'=>$country]);
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
        $this->validate($request, [
        'Name' => 'required|min:1|max:255',
        'Latitude' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        'Longitude' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        'Code' => 'required|alpha|min:2|max:2',
        'ShippingCostMultiplier' => 'numeric|regex:/^\d*(\.\d{2})?$/',
        ]);
        $ctr = \App\Country::find($id);
        if(!$this->countryExists($request->input('Name'),$request->input('Code'))){
            $ctr->Name = $request->input('Name');
            $ctr->Code = $request->input('Code');
        }
        $ctr->Latitude = empty($request->input('Latitude'))?null:$request->input('Latitude');
        $ctr->Longitude = empty($request->input('Longitude'))?null:$request->input('Longitude');
        $ctr->ShippingCostMultiplier = empty($request->input('ShippingCostMultiplier'))?null:$request->input('ShippingCostMultiplier');
        if(!$ctr->save()){
            $countries = \App\Country::all();
            return view('country.updatingone',['countries'=>$countries,'feedback'=>"mislukt",'cont'=>$ctr]);
        }else{
            $countries = \App\Country::all();
            return view('country.updatingone',['countries'=>$countries,'feedback'=>"opgeslagen",'cont'=>$ctr]);
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
        $cont = \App\Country::find($id);
        if(!$cont->delete()){
            $country = \App\Country::find($id);
            $countries = \App\Country::all();
            return view('country.readingone',['countries'=>$countries,'feedback'=>"bleeft staan",'cont'=>$cont]);
        }else{
             $country = \App\Country::find($id);
            $countries = \App\Country::all();
            return view('country.editing',['countries'=>$countries]);
        }
    }
    
    public function countryExists($name,$code){
        return \App\Country::where('Name',$name)!=NULL&&\App\Country::where('Code',$code)!=NULL;
    }
}
