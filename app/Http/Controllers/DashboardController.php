<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $result = Document::all();
        $count = count($result);
        $process = 0;
        $success = 0;
        $cancel = 0;
        for ($i = 0; $i < $count; $i++) {
            if($result[$i]->status === 1){
                $process += 1;
            }else if($result[$i]->status === 2) {
                $success += 1;
            }else {
                $cancel += 1;
            }
        }
        return view('dashbord.index')->with('process', $process)->with('success', $success)->with('cancel', $cancel)->with('total',$count);
    }
}
