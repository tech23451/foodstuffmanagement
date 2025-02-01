<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\HistoryProfile;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        // dd('addが動いた');
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);

        $profiles = new Profile;
        $form = $request->all();

        unset($form['_token']);

        $profiles->fill($form);
        $profiles->save();
        // dd('createが動いた');
        // return redirect('admin/profile/create');
        return view('admin.profile.create');
    }

    public function edit(Request $request)
    {
        // dd('editが動いた');
        
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $profile = Profile::find($request->id);
        $history = new HistoryProfile();
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect()->route('admin.profile.edit', ['id' => $profile->id]);
    }

}
