<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;



use Illuminate\Http\Request;

use DB;

class StudentsController extends Controller
{
    //
    public function index(){
        $studentData=DB::table('students')->orderBy('id','desc')->paginate(5);
        return view('home',compact('studentData'));
    }

    public function store(Request $request){

        $this->validate($request,[
'full_name'=>'required|min:3',
'email'=>'required|unique:students,email',
'address'=>'required',
'phone'=>'required|numeric|min:10|unique:students,phone',
        ] );


     $data['full_name']=$request->full_name;
     $data['email']=$request->email;
     $data['address']=$request->address;
     $data['phone']=$request->phone;
    
   
     if(DB::table('students')->insert($data)){
        return redirect()->back()->with('success','Data inserted Sucessfully');
     }else{
        return redirect()->back()->with('error','Data failed to insert');
     }
   
    }

    public function delete(Request $request){
        $id=$request->id;
        DB::table('students')->where('id','=',$id)->delete();
        return redirect()->back()->with('success','Data was deleted Sucessfully');

    }

    public function edit(Request $request){
        $id=$request->id;
        $student=DB::table('students')->where('id','=',$id)->first();
        return view('edit',compact('student'));
    }

    public function update(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
        if($request->isMethod('post')){
            $id=$request->criteria;
    
            $this->validate($request,[
                'full_name'=>'required|min:3',
                'email'=>'required|',[
                    Rule::unique('students','email')->ignore($id)
                ],
                'address'=>'required',
                'phone'=>'required|',
                 [Rule::unique('students','phone')->ignore($id)
            ],
                        ] );
                
                
                     $data['full_name']=$request->full_name;
                     $data['email']=$request->email;
                     $data['address']=$request->address;
                     $data['phone']=$request->phone;
                     
                     DB::table('students')->where('id','=',$id)->update($data);
                     return redirect()->route('index')->with('success','Data updated Successfully');
        }
       
                
    }
}
