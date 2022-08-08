<?php

namespace App\Http\Controllers;

use App\Http\Utils\Alert;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::with('role')->orderBy('id', 'DESC')->get();
        return view('settings.users.index', compact('roles', 'users'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            // 'prefix' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'role' => 'required',
        ]);

        DB::beginTransaction();
        $user = new User;
        // $user->prefix = $request->prefix;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->save();
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'เพิ่มผู้ใช้งานเรียบร้อยแล้ว');
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
    public function update(Request $request, $userId)
    {
        $request->validate([
            // 'prefix' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'role' => 'required',
        ]);

        DB::beginTransaction();
        $user = User::where('id', $userId)->first();
        // $user->prefix = $request->prefix;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $user->save();
        DB::commit();

        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        DB::beginTransaction();
        User::where('id', $userId)->delete();
        DB::commit();

        $status = new Alert('success', 'สำเร็จ', 'ลบผู้ใช้งานเรียบร้อยแล้ว');
        return back()->with('status', $status);
    }
}
