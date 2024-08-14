<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AvatarRequest;
use App\Models\User;

use App\Http\Requests\UpdateUserRequest;
use App\Jobs\DeleteUserJob;
use Illuminate\Support\Facades\Storage;

class AuthController
{
   
    public function index()
    {
        $role = request()->input('selectedRole','all');
        $searchUser = request()->input('search');
       
        $users = User::query()
        ->when($role !== 'all', fn ($query)=> $query->where('role', $role))
        ->when($searchUser,function($query,$search){
            $query->where('name','like',"%$search%")->orWhere('email','like',"%$search%");
        })
        ->paginate(8)->withQueryString()
        ->through(function ($user) {
            $user->formatted_created_at = $user->created_at->format('F j, Y \a\t g:i A');
            return $user;
        });
     
    
        // Return the data with Inertia
        return inertia('AllowedPages/User', [
            'users' => $users, 'filters'=>['selectedRole'=> $role ,'search'=>$searchUser],
        ]);
    }
    

   
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
    }
    public function download(User $user)
    {
        $avatar = $user->avatar_path;
        if (Storage::exists($avatar)) {
            return Storage::download($avatar, basename($avatar));
        }
    
        return redirect()->back()->with('error', 'Profile image not found or not available for download.');
    }
    
  
    public function destroy(User $user)
    {
        $user->deleteOrFail();
        DeleteUserJob::dispatch(['name'=>$user->name,'email'=>$user->email]);
        return redirect()->back()->with('deleted','The user '.$user->name. 'is successfully removed');
    }

    public function updateAvatar(AvatarRequest $request,User $user){
        $avatar= $user->avatar_path;

        if($request->hasFile('image_avatar')){
            if($avatar){
                Storage::delete($avatar);

            }
            $avatar=$request->file('image')->store('public/avatars');
           
        }
       
        $user->update([
            'avatar_path'=>$avatar,
        ]);

        return redirect()->back()->with('updated','Avatar successfully updated');

    }
}
