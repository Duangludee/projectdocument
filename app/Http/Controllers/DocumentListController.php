<?php

namespace App\Http\Controllers;

use App\Http\Utils\CodeUtil;
use App\Http\Globals\Constants;
use App\Http\Utils\Alert;
use App\Http\Utils\DateUtil;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Handlers;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $documents->load('handlers.user');

        // foreach ($documents as $key => $value) {
        //     //     if(count())
        //     //    echo $value->handlers;
        //     $count = 0;
        //     foreach ($value->handlers as $key => $v) {
        //         if ($v->status == 1) {
        //             $count++;
        //         }
        //     }
        //     if ($count == count($value->handlers)) {
        //         Document::where('id', $value->id)->update(['status' => 2]);
        //     }
        // }
        return view('documents.index', compact('documents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereIn('role_id', [2, 3])->get();
        $organizations = Organization::all();
        return view('documents.create', compact('users', 'organizations'));
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
        // $request->validate([
        //     'no' => 'required',
        //     'topic' => 'required',
        //     'from' => 'required',
        //     'for' => 'required',
        //     'users' => 'required',
        //     'file' => 'required|image|mimes:jpeg,png,jpg,svg'
        // ]);

        $documents = new Document;
        $documents->code = CodeUtil::generateCode('document_code');
        $documents->no = $request->no;
        $documents->topic = $request->topic;
        $documents->date_in = DateUtil::dateToDB($request->date_in);
        $documents->time_in = $request->time_in;
        $documents->date_out = DateUtil::dateToDB($request->date_out);
        $documents->time_out = $request->time_out;
        $documents->from = $request->from;
        $documents->for = $request->for;
        $documents->is_draft = $request->has('is_draft');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = 'DOC_' . time() . '_'  . $file->getClientOriginalName();
            $imageName . $file->getClientOriginalExtension();
            $documents->file = $imageName;
            $file->storeAs('public/' . Constants::$DOC_PATH, $imageName);
        }

        $documents->save();

        if (count($request->users) > 0) {
            foreach ($request->users as $key => $id) {
                $handler = new Handlers;
                $handler->document_id = $documents->id;
                $handler->user_id = $id;
                $handler->save();
            }
        }
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'เพิ่มเอกสารเรียบร้อยแล้ว');
        return redirect()->route('document.index')->with('status', $status);
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
        $document->load('handlers.user');
        $users = User::whereIn('role_id', [2, 3])->get();
        return view('documents.edit', compact('document', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $docId)
    {
        DB::beginTransaction();
        // $request->validate([
        //     'no' => 'required',
        //     'topic' => 'required',
        //     'from' => 'required',
        //     'for' => 'required',
        //     'users' => 'required',
        //     'file' => 'image|mimes:jpeg,png,jpg,svg'
        // ]);

        $document = Document::where('id', $docId)->with('handlers')->first();
        $document->no = $request->no;
        $document->topic = $request->topic;
        $document->date_in = DateUtil::dateToDB($request->date_in);
        $document->time_in = $request->time_in;
        $document->date_out = DateUtil::dateToDB($request->date_out);
        $document->time_out = $request->time_out;
        $document->from = $request->from;
        $document->for = $request->for;
        $document->is_draft = $request->has('is_draft');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = 'DOC_' . time() . '_'  . $file->getClientOriginalName();
            $imageName . $file->getClientOriginalExtension();
            $document->file = $imageName;
            $file->storeAs('public/' . Constants::$DOC_PATH, $imageName);

            if (Storage::disk('public')->exists(Constants::$DOC_PATH . $document->file)) {
                Storage::delete(Constants::$DOC_PATH . $document->file);
            }
        }

        $document->save();

        if (count($request->users) > 0) {
            $olds = Handlers::where('document_id', $document->id)->get();
            foreach ($olds as $old) {
                if (!(in_array($old->user_id, $request->users))) {
                    Handlers::find($old->id)->delete();
                }
            }

            foreach ($request->users as $id) {
                $old = Handlers::where('user_id', $id)->where('document_id', $document->id)->first();
                if (!$old) {
                    $handler = new Handlers;
                    $handler->document_id = $document->id;
                    $handler->user_id = $id;
                    $handler->status = 0;
                    $handler->save();
                }
            }
        }
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'แก้ไขเอกสารเรียบร้อยแล้ว');
        return back()->with('status', $status);
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
    // --------------------------------------------------------------------------
    public function update_showImage(Request $request, $docId)
    {

        DB::beginTransaction();
        $request->validate([
            // 'status' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,svg'
        ]);

        $userid = auth()->user()->id;
        $handler = Handlers::where(['document_id' => $docId, 'user_id' => $userid])->first();
        $document = Document::where('id', $docId)->first();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = 'SG' . $docId . '_' . $userid . '.' . $file->getClientOriginalExtension();
            $handler->image_name = $imageName;
            $file->storeAs('public/' . Constants::$SG_PATH . 'DOC_' . $docId, $imageName);

            if (Storage::disk('public')->exists(Constants::$SG_PATH . 'DOC_' . $docId . $handler->image_name)) {
                Storage::delete(Constants::$SG_PATH . 'DOC_' . $docId . $handler->image_name);
            }
        }

        $handler->status = 1;
        $handler->save();

        $handlers = Handlers::where(['document_id' => $docId])->get();
        $ar = [];
        foreach ($handlers as $key => $value) {
            array_push($ar, $value->status);
        }
        $check = count(array_unique($ar)) === 1;
        if ($check) {
            $document->status = 2;
            $document->save();
        }
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'เอกสารเลขที่ ' . $document->no . ' อัพโหลดรูปสำเร็จแล้ว');
        return back()->with('status', $status);
    }
}
