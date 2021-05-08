<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanker;
use App\Models\Carousel;

class TankerController extends Controller
{
    public function index()
    {
        //Read

        $data = Tanker::all();
        $carousel=Carousel::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.tanker',compact('data','carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //CREATE
        return view('admin.tanker.create');
        
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
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            
        ]);
        
        if ($file = $request->file('image')) {
            $request->validate([
                'image' =>'mimes:jpg,jpeg,png,bmp'
            ]);
            $image = $request->file('image');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/tanker',$fullname);
            }
    
            else{
                $fullname = 'image.png';
            }

            $data = new Tanker();
            $data->name = $request->name;
            $data->desc = $request->desc;
            $data->price = $request->price;
            $data->capacity = $request->capacity;
            $data->image = $fullname;
            $data->save();

        if($data->save()){
            //Redirect with Flash message
            return redirect('/tanker')->with('status', 'Tanker added Successfully!');
        }
        else{
            return redirect('/tanker/create')->with('status', 'There was an error!');
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
        $data = Tanker::where('id',$id)->first();
        return view('admin.tanker.show',compact('data'));
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
        
        $data = Tanker::where('id',$id)->first();
        return view('admin.tanker.edit',compact('data'));
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
        if ($file = $request->file('image')) {
            $request->validate([
                'image' =>'mimes:jpg,jpeg,png,bmp'
            ]);
            $image = $request->file('image');
            $imgExt = $image->getClientOriginalExtension();
            $fullname = time().".".$imgExt;
            $result = $image->storeAs('images/tanker',$fullname);
            }
    
            else{
                $fullname = 'image.png';
            }

        //Update
        $data = Tanker::find($id);
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->capacity = $request->capacity;
        $data->image=$fullname;

        if($data->save()){
            return redirect('/tanker')->with('status', 'Tanker edited Successfully!');
        }
        else{
            return redirect('/tanker/$id/edit')->with('status', 'There was an error');

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
        $data = Tanker::find($id);
        if($data->delete()){
            return redirect('/tanker')->with('status', 'Post was deleted successfully');
        }
        else return redirect('/tanker')->with('status', 'There was an error');

        
    }
}
