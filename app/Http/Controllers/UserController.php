<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function home()
    {
        $users = User::all();
        $teams = Team::all();
        $status = Status::all();

        return view('operator.index', compact("users", "teams", 'status'));
    }
    public function index()
    {
        $data = User::all();

        return view('users.index', compact("data"));
    }


    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $teams = Team::all();
        $status = Status::all();
         return view('users.create',compact('roles', 'teams', 'status'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'teams' => 'required',
            'status' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['team_id'] = $request->input('teams');
        $input['status_id'] = $request->input('status');

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' =>  'required|exists:roles,name', // Assurez-vous que 'roles' est un tableau
        ]);


        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);


        $user->update($input);

        $selectedRole = Role::where('name', $request->input('role'))->first();

        $user->syncRoles([$selectedRole->name]);


//        return redirect()->route('users.index')
//            ->with('success', 'User updated successfully');


    }

    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
//                        ->with('success','User deleted successfully');
    }
}
