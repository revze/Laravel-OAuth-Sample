<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToFacebook()
    {
      return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
      $user = Socialite::driver('facebook')->user();
      $select_user = User::where('social_media','facebook')->where('social_media_id',$user->getId());

      if ($select_user->count()==0) {
        $create_user = new User;
        $create_user->name = $user->getName();
        $create_user->email = $user->getEmail();
        $create_user->social_media = 'facebook';
        $create_user->social_media_id = $user->getId();
        $create_user->avatar = $user->getAvatar();
        $create_user->save();

        $select_user = User::where('social_media','facebook')->where('social_media_id',$user->getId())->first();
        Auth::loginUsingId($select_user->id,true);
        // return 'Selamat '.auth()->user()->name.' anda berhasil masuk.';
        return redirect('/');
      }

      Auth::loginUsingId($select_user->first()->id,true);
      // return 'Selamat datang kembali '.auth()->user()->name.'.';
      return redirect('/');
    }

    public function redirectToTwitter()
    {
      return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
      $user = Socialite::driver('twitter')->user();
      $select_user = User::where('social_media','twitter')->where('social_media_id',$user->getId());

      if ($select_user->count()==0) {
        $create_user = new User;
        $create_user->name = $user->getName();
        $create_user->email = '';
        $create_user->username = $user->getNickname();
        $create_user->social_media = 'twitter';
        $create_user->social_media_id = $user->getId();
        $create_user->avatar = $user->getAvatar();
        $create_user->save();

        $select_user = User::where('social_media','twitter')->where('social_media_id',$user->getId())->first();
        Auth::loginUsingId($select_user->id,true);
        // return 'Selamat '.auth()->user()->name.' anda berhasil masuk.';
        return redirect('/');
      }

      Auth::loginUsingId($select_user->first()->id,true);
      // return 'Selamat datang kembali '.auth()->user()->name.'.';
      return redirect('/');
    }

    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
      $user = Socialite::driver('google')->user();
      $select_user = User::where('social_media','google')->where('social_media_id',$user->getId());

      if ($select_user->count()==0) {
        $create_user = new User;
        $create_user->name = $user->getName();
        $create_user->email = $user->getEmail();
        $create_user->social_media = 'google';
        $create_user->social_media_id = $user->getId();
        $create_user->avatar = $user->getAvatar();
        $create_user->save();

        $select_user = User::where('social_media','google')->where('social_media_id',$user->getId())->first();
        Auth::loginUsingId($select_user->id,true);
        // return 'Selamat '.auth()->user()->name.' anda berhasil masuk.';
        return redirect('/');
      }

      Auth::loginUsingId($select_user->first()->id,true);
      // return 'Selamat datang kembali '.auth()->user()->name.'.';
      return redirect('/');
    }

    public function redirectToLinkedIn()
    {
      return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedInCallback()
    {
      $user = Socialite::driver('linkedin')->user();
      $select_user = User::where('social_media','linkedin')->where('social_media_id',$user->getId());

      if ($select_user->count()==0) {
        $create_user = new User;
        $create_user->name = $user->getName();
        $create_user->email = $user->getEmail();
        $create_user->social_media = 'linkedin';
        $create_user->social_media_id = $user->getId();
        $create_user->avatar = $user->getAvatar();
        $create_user->save();

        $select_user = User::where('social_media','linkedin')->where('social_media_id',$user->getId())->first();
        Auth::loginUsingId($select_user->id,true);
        // return 'Selamat '.auth()->user()->name.' anda berhasil masuk.';
        return redirect('/');
      }

      Auth::loginUsingId($select_user->first()->id,true);
      // return 'Selamat datang kembali '.auth()->user()->name.'.';
      return redirect('/');
    }

    public function redirectToGithub()
    {
      return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
      $user = Socialite::driver('github')->user();
      $select_user = User::where('social_media','github')->where('social_media_id',$user->getId());

      if ($select_user->count()==0) {
        $create_user = new User;
        $create_user->name = $user->getName();
        $create_user->email = $user->getEmail();
        $create_user->social_media = 'github';
        $create_user->social_media_id = $user->getId();
        $create_user->avatar = $user->getAvatar();
        $create_user->save();

        $select_user = User::where('social_media','github')->where('social_media_id',$user->getId())->first();
        Auth::loginUsingId($select_user->id,true);
        // return 'Selamat '.auth()->user()->name.' anda berhasil masuk.';
        return redirect('/');
      }

      Auth::loginUsingId($select_user->first()->id,true);
      // return 'Selamat datang kembali '.auth()->user()->name.'.';
      return redirect('/');
    }
}
