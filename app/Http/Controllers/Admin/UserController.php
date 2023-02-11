<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View as View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request):View
    {
        
        $users = User::getUsers();
        return \view('admin.users', ['users' => $users]);

    }
    public function changeRoleInAdmin(Request $request, User $user):View
    {

        DB::table('users')
        ->where('id', '=', $request->id)
        ->update(['is_admin' => '1']);
        
        
        //$user = User::getUserByID(3);
        //$user->update(['is_admin' => 1]);
        //$user->save();

        $users = User::getUsers();
        return \view('admin.users', ['users' => $users]);
    }

}
