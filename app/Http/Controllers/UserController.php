<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function delete($id)
    {

        $delete = DB::table('users')
            ->where('id',$id)
            ->delete();
        return redirect('');
    }

    public function edit($id)
    {
        $row = DB::table('users')
            ->where('id',$id)
            ->first();
        $data = [
            'Info'=>$row,
            'Title'=>'Edit'
        ];
        return view('upravitProfil',$data);
    }

    function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $updating = DB::table('users')
            ->where('id', $request->input('cid'))
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        return redirect('profil');
    }



}
