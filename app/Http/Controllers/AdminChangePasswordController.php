<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $this->authorize('changepassword');
        return view('admin.page.changepassword.index');
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

            $this->authorize('changepassword');
            
            $user = Session::get('user');
            $userData = User::find($user[0]->id);
            $passwordOld = $request['inPasswordOld'];
            $passwordNew = $request['inPasswordNew'];
            $passwordConfirm = $request['inPasswordConfirm'];

            $check = Hash::check($passwordOld, $user[0]->password);

            if ($check) {
                $userData->password = Hash::make($passwordNew);
                $updated = $userData->update();
            } else {
                return redirect()->route('changepassword.index')
                ->with('message_error', 'Password Lama tidak sesuai.');
            }

            if ($passwordNew == $passwordConfirm) {
                $userData->password = Hash::make($passwordNew);
                $updated = $userData->update();
            } else {
                return redirect()->route('changepassword.index')
                ->with('message_error', 'Password Baru dan Konfirmasi tidak sesuai.');
            }
            
            if ($updated) {
                return redirect()->route('changepassword.index')
                ->with('message_success', 'Password berhasil diperbarui.');
            } else {
                return redirect()->route('changepassword.index')
                ->with('message_error', 'Password gagal diperbarui.');
            }
        } catch(\Illuminate\Database\QueryException $e){ 
            return redirect()->route('changepassword.index')
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
