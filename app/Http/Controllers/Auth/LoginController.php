<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   
    protected $providers = [
        'github','facebook','google','twitter'
    ];

    public function show()
    {
        return view('auth.login');
    }

    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            dd($e);
            return $this->sendFailedResponse($e->getMessage());
        }
    }

  
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->stateless()->user();
        } catch (Exception $e) {
            dd($e);
            // return $this->sendFailedResponse($e->getMessage());
        }
        
        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        // return redirect()->intended('home');
        return response()->json([
            "status"=>"Success",
            "message"=>Auth()->user(),
        ]);
    }

    protected function sendFailedResponse($msg = null)
    {
        return response()->json([
            "status"=> "Error",
            "message"=>$msg==null ?$msg : 'Unable to login, try with another provider to login.',
        ]);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => ''
            ]);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }

    public function  register(Request $request){
        $fields = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password']),
        ]);

        $token = $user -> createToken('AuthToken')-> plainTextToken;

        $response = [
            'user'=> $user,
            'token' => $token
        ];

        return response([
            'status' => 'E201',
            'user'=>$response,
        ],201);

    }

    public function  login(Request $request){
        $fields = $request->validate([
            'email'=> 'required|string',
            'password'=>'required|string'
        ]);

     

        //Checking data Email and Password

        $user =User::where('email',$fields['email'])->first();
        if($user==null || (bool)$user->isDisable){
            return response([
                'status' => 'E401',
                'message'=> 'User not found or being disabled',
            
            ],401);
        }
        if($fields['email']!=$user->email){
            return response([
                'status' => 'E403',
                'message'=> 'Error Email',
            
            ],401);
        };
        if(!Hash::check($fields['password'],$user->password)){
            return response([
                'status' => 'E402',
                'message'=> 'Error Password',
            
            ],401);
        };
        $token = $user -> createToken('AuthToken')-> plainTextToken;

        $response = [
            'user'=> $user,
            'token' => $token
        ];

        return response([
            'status' => 'E201',
            'user'=>$response,
        ],201);

    }



    public function logout(Request $request){
        Auth::logout();
        return response([
            'status' => 'E201',            
        ],201);

    }
}