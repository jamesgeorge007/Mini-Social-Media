<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signIn(Request $request)
    {
        $email = $request['email'];
        $password = bcrypt($request['password']);
    }

    public function signUp(Request $request)
    {
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        $user->save();

        return redirect()->back();
    }
}
?>