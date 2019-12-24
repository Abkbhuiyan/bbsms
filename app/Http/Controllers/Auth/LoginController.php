<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/donor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:seeker')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:mo')->except('logout');
        $this->middleware('guest:bb')->except('logout');
        $this->middleware('guest:vOrg')->except('logout');
    }

    public function showSeekerLoginForm(){
        return view('auth.login', ['url' => 'seeker']);
    }
    public function showAdminLoginForm(){
        return view('auth.login', ['url' => 'admin']);
    }
    public function showBloodBankLoginForm(){
        return view('auth.login', ['url' => 'bb']);
    }
    public function showMedicalOfficerLoginForm(){
        return view('auth.login', ['url' => 'mo']);
    }
    public function showVoluntaryOrganizationLoginForm(){
        return view('auth.login', ['url' => 'vOrg']);
    }

    public function seekerLogin(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('seeker')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/seeker');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public function adminLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function bloodBankLogin(Request $request){
        //dd( $request->all());
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('bb')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
       return $this->sendFailedLoginResponse($request);
        //return back()->withInput($request->only('email', 'remember'));
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function medicalOfficerLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('mo')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/medicalOfficer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function voluntaryOrganizationLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('vOrg')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/voluntaryOrganization');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function allLogout(){
        Auth::logout();
    }
}
