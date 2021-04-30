<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Hash;


class UserController extends Controller
{
    public function index()
    {
        //Read

        $data = User::all();
        return view('admin.user.main',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.user.create');
        
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
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'email' => ['required',],
            'password' => ['required'],
            
        ]);
        

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
            
        ]);

        if($data){
            //Redirect with Flash message
            return redirect('/user')->with('status', 'User created Successfully!');
        }
        else{
            return redirect('/user/create')->with('status', 'There was an error!');
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
        $data = User::where('id',$id)->first();
        return view('admin.user.show',compact('data'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function edit($id)
    {
        //Update View
        $data = User::where('id',$id)->first();
        return view('admin.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
function update(Request $request, $id)
    {
        //Update
        $data = User::find($id)->first();

        $data->name = $request->name;
        $data->email = $request->email;
       
       

        if($data->save()){
            return redirect('/user')->with('status', 'User edited Successfully!');
        }
        else{
            return redirect('/user/$id/edit')->with('status', 'There was an error');

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        //Delete
        $data = User::find($id);
        if($data->delete()){
            return redirect('/user')->with('status', 'User was deleted successfully');
        }
        else return redirect('/user')->with('status', 'There was an error');

        
    }

}