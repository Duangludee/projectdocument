<?php

namespace App\Http\Controllers;

use App\Http\Utils\Alert;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('settings.informations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'organization_name' => 'required|string|max:255'
        ]);
        DB::beginTransaction();
        $or = new Organization;
        $or->name = $request->organization_name;
        $or->save();
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'เพิ่มหน่วยงานเรียบร้อยแล้ว');
        return back()->with('status', $status);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orId)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255'
        ]);
        DB::beginTransaction();
        $or = Organization::where('id', $orId)->first();
        $or->name = $request->organization_name;
        $or->save();
        DB::commit();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($orId)
    {
        DB::beginTransaction();
        Organization::where('id', $orId)->delete();
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'ลบหน่วยงานเรียบร้อยแล้ว');
        return back()->with('status', $status);
    }
}
