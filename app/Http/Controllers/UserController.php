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
}
