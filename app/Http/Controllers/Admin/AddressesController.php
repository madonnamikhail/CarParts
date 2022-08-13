<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adress\StoreAddressRequest;

class AddressesController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Index Addresses,admin')->only('index');
        $this->middleware('permission:Store Addresses,admin')->only('create','store');
        $this->middleware('permission:Update Addresses,admin')->only('edit','update');
        $this->middleware('permission:Destroy Addresses,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = $user->with('addresses.region.city')->where('id',$user->id)->first();
        return view('Admin.users.addresses.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $regions = Region::all();
        // return "hh";
        return view('Admin.users.addresses.create',['user'=>$user,'regions'=>$regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request,User $user)
    {
        $user->addresses()->create($request->safe()->except('_token','create'));
        return redirect()->route('users.addresses.index',$user->id)->with('success','تمت العملية بنجاح');
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
    public function edit(User $user,Address $address)
    {
        $regions = Region::all();
        return view('Admin.users.addresses.edit',['address'=>$address,'user'=>$user,'regions'=>$regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddressRequest $request,User $user, Address $address)
    {
        $address->update($request->safe()->except('_token','_method'));
        return redirect()->route('users.addresses.index',$user->id)->with('success','تمت العملية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Address $address)
    {
       $address->delete();
       return redirect()->route('users.addresses.index',$user->id)->with('success','تمت العملية بنجاح');
    }
}
