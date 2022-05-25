<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admissions;

class AdmissionItems extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admissions::get();
        return $admissions;
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

        $validator = $this->validate($request, [
            'full_name' => 'required',
            'email'     => 'required|email',
            'address_1' => 'required',
            'city'      => 'required',
            'state'     => 'required',
            'zip'       => 'required',
            'profile_image' => 'required'
        ]);

        dd($validator);

    //     if (!$validator) {
    //         return response()->json([
    //             'message' => 'message',
    //             'success' => false
    //         ]);
    //     }

        $newContact = new Admissions;
        $newContact->full_name = $request->full_name;
        $newContact->email = $request->email;
        $newContact->address_1 = $request->address_1;
        $newContact->address_2 = $request->address_2;
        $newContact->city = $request->city;
        $newContact->state = $request->state;
        $newContact->zip = $request->zip;
        $date = date("D M d, Y G:i");
        $fileName = strtotime($date).'_'.$request->file('profile_image')->getClientOriginalName();
        $path = $request->file('profile_image')->storeAs('public/user_images', $fileName);
        $newContact->profile_image = $fileName;
        $newContact->save();


        // Admissions::create($request->all());
        return response()->json(['success'=>'Form Submited Successfully']);
        return redirect('admission')->with('success', 'Thanks for submiting');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
