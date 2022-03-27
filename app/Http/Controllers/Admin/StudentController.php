<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
      //_constructor_//
      public function __construct()
      {
          $this->middleware('auth');
      }

    public function index()
    {
        $students = DB::table('students')->join('classes','students.class_id','classes.id')->get();
        //$students=DB::table('students')->orderBy('roll','ASC')->get();
        return view('admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('admin.student.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'roll' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $data =array(
            'class_id' => $request->class_id,
            'roll' => $request->roll,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        );
        DB::table('students')->insert($data);
        return redirect()->back()->with('success','Data Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showStudent = DB::table('students')->find($id);
        return view('admin.student.show',compact('showStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = DB::table('classes')->get();
        $student = DB::table('students')->where('id',$id)->first();
        return view('admin.student.edit',compact('classes','student'));
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
        $request->validate([
            'class_id' => 'required',
            'roll' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $data =array(
            'class_id' => $request->class_id,
            'roll' => $request->roll,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        );
        DB::table('students')->where('id',$id)->update($data);
        return redirect()->route('students.index')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }
}
