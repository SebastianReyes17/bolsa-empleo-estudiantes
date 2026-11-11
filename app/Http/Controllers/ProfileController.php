<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function edit() { return view('profile.edit',['user'=>Auth::user()]); }
    public function update(Request $request) { $data=$request->validate(['name'=>'required|string|max:120','career'=>'nullable|string|max:150','phone'=>'nullable|string|max:30','bio'=>'nullable|string|max:1000']); Auth::user()->update($data); return back()->with('success','Perfil actualizado.'); }
}
