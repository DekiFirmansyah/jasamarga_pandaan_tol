<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Services\TrashService;
use App\Services\ChangePasswordService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::with(['roles'])->get();
        return view('admin.users.index', compact(
            'datas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
     
    public function store(User $user, StoreUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        $user->create($input);
        $user->assignRole($request->input('roles'));
        

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect(route('user.index'))->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, User $user)
    {
        $user->where('id', $id)->first();
        return view('admin.users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');

        $user->load('roles');
        
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $user->update($request->all());
        $user->syncRoles($request->input('roles'));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User Berhasil Dihapus');
    }

    public function trash()
    {
        $user = User::onlyTrashed()->paginate();
        return view('admin.users.trash', compact('user'));
    }

    public function restore($id, TrashService $trashService)
    {
        $user = User::withTrashed()->findOrFail($id);
        $root = '-user';
        return $trashService->restore($user, $root);
    }
    
    public function deletePermanent($id, TrashService $trashService)
    {
        $user = User::withTrashed()->findOrFail($id);
        $root = '-user';
        return $trashService->delete($user, $root);
    }
    
    public function deleteAllPermanent(TrashService $trashService)
    {
        $user = User::withTrashed();
        $root = '-user';
        return $trashService->delete($user, $root);
    }

    public function changePassword($id, User $user)
    {
        $user->where('id', $id)->first();
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(ChangePasswordRequest $request, $id, User $user)
    {
        $input = $request->all();
        
        $user->where('id', $id);
        #Update the new Password
        $user->update([
            'password' => Hash::make($input['new_password'])
        ]);

        return redirect()->route('user.index')->with("status", "Password changed successfully!");
    }
}