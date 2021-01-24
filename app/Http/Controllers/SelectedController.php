<?php

namespace App\Http\Controllers;

use App\Clas;
use App\Major;
use App\Student;
use Illuminate\Http\Request;

class SelectedController extends Controller
{
    public function Index(){
        $data ['major'] = Major::select('id', 'major_name')->get();
        return view ('/index', $data);
    }

    public function JsonClass($id){
        $kelas = Clas::whereMajorId($id)->get();
        return response()->json(compact('kelas'));
    }

    public function JsonStudent($id){
        $data ['siswa'] = Student::whereClassId($id)->get();
        return response()->json($data);
    }


}
