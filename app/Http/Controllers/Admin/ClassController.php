<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
    //_constructor_//

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['classes']= DB::table('classes')->get();
        return view('Admin.Class.index',$data);

    }

    //_class create function_//
    public function create()
    {
        return view('admin.class.create');
    }

    //_class store function_//
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|unique:classes',
        ]);
       $data = array(
           'class_name' => $request->class_name,
       );
       DB::table('classes')->insert($data);
       return redirect()->back()->with('success',"Class Inserted Successfully");
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
        $editData=DB::table('classes')->where('id',$id)->first();
        return view('admin.class.edit',compact('editData'));
    }

   //_Class Delete function_//
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'class_name' => 'required',
        ]);
       $data = array(
           'class_name' => $request->class_name,
       );
       DB::table('classes')->where('id',$id)->update($data);
       return redirect()->back()->with('success',"Class Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return redirect()->back()->with('success',"Class Delete Successfully");
    }
}
