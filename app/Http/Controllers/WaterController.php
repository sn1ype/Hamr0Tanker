<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\water;

class WaterController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Read

        $data = water::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.futsals.main',compact('futsals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.futsals.create');
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CREATE
    //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'owner_name' => 'required',
            'photo'=>'required',
            'contact'=>'required',
            'city'=>'required',
            'area'=>'required',
            'map'=>'required'
        ]);

        if ($file = $request->file('photo')) {
        $request->validate([
            'photo' =>'mimes:jpg,jpeg,png,bmp'
        ]);
        $image = $request->file('photo');
        $imgExt = $image->getClientOriginalExtension();
        $fullname = time().".".$imgExt;
        $result = $image->storeAs('images/futsals',$fullname);
        }

        else{
            $fullname = 'image.png';
        }

        

        $futsals = new Futsal();
        $futsals->name = $request->name;
        $futsals->owner_name = $request->owner_name;
        $futsals->photo = $fullname;
        $futsals->contact = $request->contact;
        $futsals->city = $request->city;
        $futsals->area = $request->area;
        $futsals->map = $request->map;
        $futsals->save();


        if($futsals){
            //Redirect with Flash message
            return redirect('/futsal')->with('status', 'Futsal added Successfully!');
        }
        else{
            return redirect('/futsal/create')->with('status', 'There was an error!');
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
        //Read individual
        // $posts = Post::find(3)->get();
        $futsals = Futsal::findOrFail($id);
        return view('admin.futsals.show',compact('futsals'));
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
        //Update View
        $futsals = Futsal::where('id',$id)->first();
        return view('admin.futsals.edit',compact('futsals'));
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
        //Update
        $futsals = Futsal::find($id)->first();

        $futsals->name = $request->name;
        $futsals->owner_name = $request->owner_name;
        $futsals->photo = $fullname;
        $futsals->contact = $request->contact;
        $futsals->city = $request->city;
        $futsals->area = $request->area;
        $futsals->map = $request->map;

        if($futsals->save()){
            return redirect('/futsal')->with('status', 'Post edited Successfully!');
        }
        else{
            return redirect('/futsal/$id/edit')->with('status', 'There was an error');

        }
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
        //Delete
        $futsals = Futsal::find($id);
        if($futsals->delete()){
            return redirect('/futsal')->with('status', 'Post was deleted successfully');
        }
        else return redirect('/futsal')->with('status', 'There was an error');

        
    }
}