<?php


namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**0
     * Display the user's profile form.
     */
    public function index(): View
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function create(): View
    {
        return view('admin.addUser');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect()->route('admin.index')->with('success', 'Muvaffaqqiyatli qo\'shildi');
    }


    public function edit($id): View
    {
        $users = User::where('id', $id)->first();
        return view('admin.editUser', compact('users'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $users): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $users = User::find($request->id);
        $users['password'] = bcrypt($request->password);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();

        return redirect()->route('admin.index')->with('success', 'Muvaffaqqiyatli yangilandi');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
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
