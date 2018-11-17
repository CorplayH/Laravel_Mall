<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = getTimeR(auth()->user()->created_at);
        $addresses = Address::where('user_id',auth()->user()->id)->orderBy('is_default','desc')->get();
        
        return view('home.address.address', compact('time','addresses'));
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $numAddr = Address::where('user_id', auth()->user()->id)->count();
        if ($numAddr < 5) {
            $request['name']    = $request['fname'].' '.$request['lname'];
            $request['user_id'] = auth()->user()->id;
            if (isset($request->is_default)) {
                auth()->user()->address()->update(['is_default' => 1]);
            }
            Address::create($request->all());
    
            return back()->with('success', 'New address is added');
        }
        return back()->with('error', 'You have too many shopping address');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Address      $address
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request,Address $address)
    {
        $request['name']    = $request['fname'].' '.$request['lname'];
        $request['user_id'] = auth()->user()->id;
        if (isset($request->is_default)) {
            $request->is_default = 1;
            auth()->user()->address()->where('id','!=',$address['id'])->update(['is_default' => 0]);
        }else{
            $request['is_default'] = 0;
        }
        $address->update($request->all());
        return back()->with('success', 'New address is added');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('user.address.index')->with('success','Gone');
    }
}
