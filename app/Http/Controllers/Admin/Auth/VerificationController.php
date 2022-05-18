<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PermissionGenerator;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

        /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('admin.auth.verify');
    }
        /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        //
        $role = Role::create(['name' => 'Super Admin','guard_name'=>'admin']);
        $this->guard()->user()->assignRole($role);
        $controllers_permissions = (new PermissionGenerator)->generate()->exceptNamespaces(["App\Http\Controllers\Admin\Auth"])->exceptMethods(['create','edit'])->get();
        foreach($controllers_permissions AS $controller => $permissions){
            foreach($permissions AS $permission){
                Permission::create(['name'=>ucwords("{$permission} {$controller}"),'guard_name'=>'admin','controller'=>$controller]);
            }
        }


    }
}
