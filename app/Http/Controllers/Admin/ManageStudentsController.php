<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Degree;
use Illuminate\Support\Facades\DB;




class ManageStudentsController extends Controller
{

    public function index(Request $request)
    { 
        $data = Degree::all();
        return view('admin.manage_students.manage_students_index', compact('data'));
    }

    // public function manage_students_info(Request $request)
    // {
    //     $data = Degree::all();
    //     $level = $request->level;
    //     $search = Degree::where('level', $request->$level)->get();
    //     return view('admin.manage_students.manage_students_index', compact('search', 'data'));
    // }


    public function manage_students_info(Request $request){

        $level = $request->input('level');
       
        $query = DB::table('degrees')->select()
            ->where('level', '=', $level)
            ->get();
        // dd($query);

        $data = Degree::where('level', '=',  $level)->get();

        return view('admin.manage_students.manage_students_index', compact('data','query'));
    
    }
}
