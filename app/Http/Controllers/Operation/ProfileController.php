<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        return view('operation.profile')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        dd( $request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->image;
            $new_image_name = time() . $image->getClientOriginalName();
            $image->move('uploads/images', $new_image_name);
            $user->profile->image = 'uploads/images/' . $new_image_name;
            $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;

        $user->save();
        $user->profile->save();
          Session::flash('success', 'Account profile Updated');
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        //
    }
}


