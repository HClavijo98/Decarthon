<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Bank_account;
use App\Models\Banned;
use App\Models\Banned_user;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sugestion_box;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $user = User::find($request->user()->id);
        $account = Bank_account::find($user->bank_account_id);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $account->IBAN = $request->IBAN;
        $user->fill($request->validated());
        $user->save();
        $account->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $sugestions = Sugestion_box::all();
        $user = $request->user();

        foreach($sugestions as $sugestion){
            if($sugestion->user_id == $user->id){
                $sugestion->delete();
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function logOut(){
        Auth::logout();
        return Redirect::to('/');
    }
    public function gestion(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $users = User::all();
        $accounts = Bank_account::all();
        $banneds = Banned::all();
        return view('gestion',['products'=>$products,'categories'=>$categories,'brands'=>$brands,'users'=>$users,'accounts'=>$accounts,'banneds'=>$banneds]);
    }
    public function upgrade(Request $request){
        $user = User::find($request->user);
        $user->assignRole('admin');
        $user->save();
        return Redirect::to('/gestion');
    }
    public function downgrade(Request $request){
        $user = User::find($request->user);
        $user->removeRole('admin');
        $user->assignRole('cliente');
        $user->save();
        return Redirect::to('/gestion');
    }
    public function delete(Request $request){
        $banned = new Banned();
        $user = User::find($request->user);
        $banned->email = $user->email;

        $banned->save();
        return Redirect::to('/gestion');
    }
}
