<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('sitemanager.user.index', compact('users'));
    }

    public function store()
    {
        return $this->save();
    }

    public function update($id)
    {
        return $this->save($id);
    }

    public function save($id = null)
    {
        if($id){
            $user = User::find($id);
        }else{
            $user = new User;
        }

        $user->username = request()->input('username');
        $user->email = request()->input('email');

        if(filled(request()->input('password'))){
            $user->password = \Hash::make(request()->input('password'));
        }

        $user->level = request()->input('level');

        $user->save();

        $message = sprintf('Data Telah di%s', $id ? 'simpan' : 'tambahkan');

        return redirect()->route('sitemanager.user.index')->withMessage($message);
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null)
    {
        if(!is_null($id)){
            if($id){
                $user = User::find($id);
                session()->flashInput(array_merge($user->toArray(), old()));
            }else{
                session()->flashInput(old());
            }

            $method = 'PUT';
            $action = route('sitemanager.user.update', $id);
        }else{
            $method = 'POST';
            $action = route('sitemanager.user.store');
        }

        $level = [
            'admin', 'reporter'
        ];

        return view('sitemanager.user.form', compact('action', 'method', 'level'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->route('sitemanager.user.index')->withMessage('User Telah Dihapus');
        }
    }

}
