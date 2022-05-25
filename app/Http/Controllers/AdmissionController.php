<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admissions;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admmission = Admissions::orderBy('id', 'desc')->get();
        return view('showAdmission')->with('admmission', $admmission);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createAdmission');
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
            'full_name' => 'required',
            'email'     => 'required|email',
            'address_1' => 'required',
            'city'      => 'required',
            'state'     => 'required',
            'zip'       => 'required',
            'profile_image' => 'required'
        ]);

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
        // return response()->json(['success'=>'Form Submited Successfully']);
        return redirect('admission')->with('success', 'Thanks for submiting');
        // $request->input('fullname');
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
     * Show the form for editing the spe$addmissioncified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $addmission = Admissions::findOrFail($id);
        return view('editAdmission')->with('addmission', $addmission);
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
        $updatedContact = Admissions::findOrFail($id);
        // Admissions::update($addmission, $request->all());
        $this->validate($request, [
            'full_name' => 'required',
            'email'     => 'required',
            'address_1' => 'required',
            'city'      => 'required',
            'state'     => 'required',
            'zip'       => 'required',
        ]);
        // [
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'address_1' => $request->address_1,
        //     'address_2' => $request->address_2,
        //     'city' => $request->city,
        //     'state' => $request->state,
        //     'zip' => $request->zip

        // ]
        // $updatedContact = new Admissions;
        $updatedContact->full_name = $request->full_name;
        $updatedContact->email = $request->email;
        $updatedContact->address_1 = $request->address_1;
        $updatedContact->address_2 = $request->address_2;
        $updatedContact->city = $request->city;
        $updatedContact->state = $request->state;
        $updatedContact->zip = $request->zip;
        $date = date("D M d, Y G:i");
        $fileName = strtotime($date).'_'.$request->file('profile_image')->getClientOriginalName();
        $path = $request->file('profile_image')->storeAs('public/user_images', $fileName);
        $updatedContact->profile_image = $fileName;
        $updatedContact->save();

        // $addmission->update($request->all());
        // $admissionData->save();
        return redirect('admission')->with('success', 'Date has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (empty($id)) {
        //     Admissions::where('id', '!=', null)->delete();
        //     return redirect('admission')->with('success', 'All Recoreds Deleted');
        // }
        $addmission = Admissions::findOrFail($id);
        $addmission->delete();
        return redirect('admission')->with('success', 'Row Deleted');
    }

    public function mymetnod()
    {
        dd('working');
            // Admissions::where('id', '!=', null)->delete();
            // return redirect('admission')->with('success', 'All Recoreds Deleted');
    }
}
