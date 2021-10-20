<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ustadz;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ustadzs = Ustadz::get();
        $roles = Role::get();
        return view('admin.page.user.index', compact('ustadzs'), compact('roles'));
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
        //
        try {
            //
            $user = new User;
            $user->name = $request['inName'];
            $user->email = $request['inEmail'];
            $user->role = $request['soRole'];
            $user->status = $request['soStatus'];
            $user->password = Hash::make('password');
            $save = $user->save();
            // return response()->json(compact('user','token'), 201);
            

            if ($save) {
                return redirect()->route('user.index')
                ->with('message_success', 'Tahun User berhasil disimpan.');
            } else {
                return redirect()->route('user.index')
                ->with('message_error', 'Tahun User gagal disimpan.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('user.index')
            ->with('message_error', $e->getMessage());
        }
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
        $user = User::find($id);
        $data = array(
            'id' => $user->id, 
            'name' => $user->name,
            'level' => $user->role,
            'email' => $user->email,
            'status' => $user->status);
        return json_encode($data);
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
        try {
            //
            $user = User::find($id);
            $user->role = $request['soRoleEdit'];
            $user->status = $request['soStatusEdit'];
            $updated = $user->update();
            
        
            if ($updated) {
                return redirect()->route('user.index')
                ->with('message_success', 'Tahun User berhasil diperbarui.');
            } else {
                return redirect()->route('user.index')
                ->with('message_error', 'Tahun User gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('user.index')
            ->with('message_error', $e->getMessage());
        }
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

    public function search($email) { 
        $ustadz = Ustadz::where('ustadz.ustadz_email', '=', $email)->get();
        return response()->json($ustadz);
    }

    public function listData() { 
        $users = User::leftJoin('role', 'users.role', '=', 'role.role_id')
        ->get();
        
        $no = 0;
        $data = array();
        foreach ($users as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->id;
            $row[] = $user->name;
            $row[] = $user->email;
            $row[] = $user->role_name;
            $row[] = $user->status;
            $row[] = '<div class="col">
                        <div class="btn-group">
                            <a href="#" onclick="editForm(' . $user->id . ')" class="btn btn-success px-4 ms-auto" data-bs-toggle="modal"><i class="bx bx-edit"></i>Edit</a>
                        </div>
                    </div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
