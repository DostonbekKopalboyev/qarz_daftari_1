<?php


namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**0
     * Display the user's profile form.
     */
    public function index(): View
    {
        $users = User::paginate(20);

        return view('admin.index', ['users' => $users]);
    }

    public function create(): View
    {
        $roles = Role::all();

        return view('admin.addUser',['roles'=>$roles]);
    }

    public function store(Request $request): RedirectResponse
    {
        if(Auth::user()->hasDirectPermission('profile.store')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->assignRole($request->role);

            $user->save();
        }
        return redirect()->route('admin.index')->with('success', 'Muvaffaqqiyatli qo\'shildi');
    }


    public function edit($id): View
    {

        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('admin.editUser', compact('user'),['roles'=>$roles]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
//        dd($request->all());
        if(Auth::user()->hasDirectPermission('profile.update')) {
            $request->validate([
                'id' => 'required',
                'name' => 'required',
                'password' => 'required',
                'email' => 'required',
                'role' => 'required'
            ]);

            $user['password'] = bcrypt($request->password);
            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();
            $user->syncRoles($request->role);
        }
        return redirect()->route('admin.index')->with('success', 'Muvaffaqqiyatli yangilandi');
    }

    public function destroy($id)
    {
        if(Auth::user()->hasDirectPermission('profile.destroy')){
        User::where('id', $id)->delete();}
        return redirect()->back();
    }

    public function permission(User $user)
    {
        if(Auth::user()->hasDirectPermission('profile.permission')) {
            $user_permission = $user->permissions;
            $permissions = Permission::all();
        return view('admin.permissions',['user_permissions'=>$user_permission, 'user'=>$user,'permissions'=>$permissions]);
        }
    }
    public function add_permission(User $user, Request $request){

        if(!$user->hasPermissionTo($request->permission)){
            return redirect()->back();
        }
        else{
            $user->givePermissionTo($request->permission);
            return redirect()->back();
        }
    }
    public function revoke_permission($permission, User $user){
        $user->revokePermissionTo($permission);
        return redirect()->back();
    }



//    public function edit(Request $request): View
//    {
//        return view('profile.edit', [
//            'user' => $request->user(),
//        ]);
//    }
//
//    /**
//     * Update the user's profile information.
//     */
//    public function update(ProfileUpdateRequest $request): RedirectResponse
//    {
//        $request->user()->fill($request->validated());
//
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
//
//        $request->user()->save();
//
//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
//    }

    /**
     * Delete the user's account.
     */
//    public function destroy(Request $request): RedirectResponse
//    {
//        $request->validateWithBag('userDeletion', [
//            'password' => ['required', 'current-password'],
//        ]);
//
//        $user = $request->user();
//
//        Auth::logout();
//
//        $user->delete();
//
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return Redirect::to('/');
//    }
}

//
//namespace App\Http\Controllers;
//
//use App\Http\Requests\ProfileUpdateRequest;
//use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\View\View;
//
//class ProfileController extends Controller
//{
//    /**
//     * Display the user's profile form.
//     */
//    public function edit(Request $request): View
//    {
//        return view('profile.edit', [
//            'user' => $request->user(),
//        ]);
//    }
//
//    /**
//     * Update the user's profile information.
//     */
//    public function update(ProfileUpdateRequest $request): RedirectResponse
//    {
//        $request->user()->fill($request->validated());
//
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
//
//        $request->user()->save();
//
//        return Redirect::route('profile.edit')->with('status', 'profile-updated');
//    }
//
//    /**
//     * Delete the user's account.
//     */
//    public function destroy(Request $request): RedirectResponse
//    {
//        $request->validateWithBag('userDeletion', [
//            'password' => ['required', 'current-password'],
//        ]);
//
//        $user = $request->user();
//
//        Auth::logout();
//
//        $user->delete();
//
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return Redirect::to('/');
//    }
//}
