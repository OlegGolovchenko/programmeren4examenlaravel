<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = \App\Customer::all();
        return view('customer.editing',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = \App\Customer::all();
        $countries = \App\Country::pluck('Name','Id');
        return view('customer.insertingone',['customers'=>$customers,'feedback'=>"",'countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'NickName'=>'required|min:1|max:11',
            'FirstName'=>'required|min:1|max:256',
            'LastName'=>'required|min:1|max:256',
            'Address1'=>'required|min:1|max:256',
            'Address2'=>'min:1|max:256',
            'City'=>'required|min:1|max:256',
            'Region'=>'min:1|max:81',
            'PostalCode'=>'required|min:1|max:21',
            'Phone'=>'min:1|max:41',
            'Mobile'=>'min:1|max:41',
            ]);
        $ctr = new \App\Customer();
        $ctr->NickName = $request->input('NickName');
        $ctr->FirstName = $request->input('FirstName');
        $ctr->LastName = $request->input('LastName');
        $ctr->Address1 = $request->input('Address1');
        $ctr->Address2 = empty($request->input('Address2'))?null:$request->input('Address2');
        $ctr->City = $request->input('City');
        $ctr->Region = empty($request->input('Region'))?null:$request->input('Region');
        $ctr->PostalCode = $request->input('PostalCode');
        $ctr->IdCountry = \App\Country::find($request->get('Country'))->Id;
        \App\Country::find($request->get('Country'))->customers->add($ctr);
        $ctr->Phone = empty($request->input('Phone'))?null:$request->input('Phone');
        $ctr->Mobile = empty($request->input('MobilePhone'))?null:$request->input('MobilePhone');
        if(!$ctr->save()){
            $customers = \App\Customer::all();
            $countries = \App\Country::pluck('Name','Id');
            return view('customer.insertingone',['customers'=>$customers,'feedback'=>"",'countries'=>$countries]);
        }else{
            $customers = \App\Customer::all();
            $countries = \App\Country::pluck('Name','Id');
            return view('customer.insertingone',['customers'=>$customers,'feedback'=>"opgeslagen",'countries'=>$countries]);
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
        $customer = \App\Customer::find($id);
        $customers = \App\Customer::all();
        $countries = \App\Country::pluck('Name','Id');
        return view('customer.readingone',['customers'=>$customers,'feedback'=>"",'cust'=>$customer,'countries'=>$countries]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = \App\Customer::find($id);
        $customers = \App\Customer::all();
        $countries = \App\Country::pluck('Name','Id');
        return view('customer.updatingone',['customers'=>$customers,'feedback'=>"",'cust'=>$customer,'countries'=>$countries]);
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
        $this->validate($request,[
            'NickName'=>'required|min:1|max:10',
            'FirstName'=>'required|min:1|max:255',
            'LastName'=>'required|min:1|max:255',
            'Address1'=>'required|min:1|max:255',
            'Address2'=>'min:1|max:255',
            'City'=>'required|min:1|max:255',
            'Region'=>'min:1|max:80',
            'PostalCode'=>'required|min:1|max:20',
            'IdCountry'=>'exists:country,Id',
            'Phone'=>'min:1|max:40',
            'Mobile'=>'min:1|max:40',
            ]);
        $ctr = \App\Customer::find($id);
        $ctr->NickName = $request->input('NickName');
        $ctr->FirstName = $request->input('FirstName');
        $ctr->LastName = $request->input('LastName');
        $ctr->Address1 = $request->input('Address1');
        $ctr->Address2 = empty($request->input('Address2'))?null:$request->input('Address2');
        $ctr->City = $request->input('City');
        $ctr->Region = empty($request->input('Region'))?null:$request->input('Region');
        $ctr->PostalCode = $request->input('PostalCode');
        $ctr->IdCountry = \App\Country::find($request->get('Country'))->Id;
        \App\Country::find($request->get('Country'))->customers->add($ctr);
        $ctr->Phone = empty($request->input('Phone'))?null:$request->input('Phone');
        $ctr->Mobile = empty($request->input('MobilePhone'))?null:$request->input('MobilePhone');
        if(!$ctr->save()){
            $customers = \App\Customer::all();
            $countries = \App\Country::pluck('Name','Id');
            return view('customer.updatingone',['customers'=>$customers,'feedback'=>"mislukt",'cust'=>$ctr,'countries'=>$countries]);
        }else{
            $customers = \App\Customer::all();
            $countries = \App\Country::pluck('Name','Id');
            return view('customer.updatingone',['customers'=>$customers,'feedback'=>"opgeslagen",'cust'=>$ctr,'countries'=>$countries]);
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
        $cust = \App\Customer::find($id);
        if(!$cust->delete()){
            $customer = \App\Customer::find($id);
            $customers = \App\Customer::all();
            $countries = \App\Country::pluck('Name','Id');
            return view('customer.readingone',['customers'=>$customers,'feedback'=>"bleeft staan",'cust'=>$cust,'countries'=>$countries]);
        }else{
             $customer = \App\Customer::find($id);
            $customers = \App\Customer::all();
            return view('customer.editing',['customers'=>$customers]);
        }
    }
}
