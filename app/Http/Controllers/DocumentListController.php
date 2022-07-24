<?php

namespace App\Http\Controllers;

use App\Http\Globals\Constants;
use App\Http\Utils\Alert;
use App\Http\Utils\DateUtil;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('created_at', 'DESC')->get();
        $documents->load('docStatus');
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'no' => 'required',
            'topic' => 'required',
            'from' => 'required',
            'for' => 'required',
            'users' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,svg'
        ]);

        $documents = new Document;
        $documents->no = $request->no;
        $documents->topic = $request->topic;
        $documents->date_in = DateUtil::dateToDB($request->date_in);
        $documents->time_in = $request->time_in;
        $documents->date_out = DateUtil::dateToDB($request->date_out);
        $documents->time_out = $request->time_out;
        $documents->from = $request->from;
        $documents->for = $request->for;
        $documents->users = $request->users;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = 'DOC_' . time() . '_'  . $file->getClientOriginalName();
            $imageName . $file->getExtension();
            $documents->file = $imageName;
            $file->storeAs('public/' . Constants::$DOC_PATH, $imageName);
        }

        $documents->save();
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'เพิ่มเอกสารเรียบร้อยแล้ว');
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
        $document = Document::where('id', $id)->first();
        $document->load('docStatus');
        return view('documents.edit', compact('document'));
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
        //
    }
}
