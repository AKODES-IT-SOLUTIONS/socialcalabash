<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LinkedChannel;
use App\Models\SocialPost;
use App\Http\Requests\UserValidation;
use App\Http\Requests\profileInfoRequest;
use App\Http\Requests\LinkedChannelsRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Logic\FacebookGraphAPI;

class UserController extends Controller
{
    public function signin()
    {

        return view('dashboard.signin');
    }

    public function authSignIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:200'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $users_details = Auth::user();

            // -- Setting sessions -- //
            Session::put('facebook_connect', $users_details->facebook_connect);
            Session::put('twitter_connect', $users_details->twitter_connect);
            Session::put('insta_connect', $users_details->insta_connect);
            Session::save();
            // -- Setting sessions -- //
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->back()->withErrors(["error" => "❌ Invalid Credentials"]);
        }

    }

    public function signup()
    {

        return view('dashboard.signup');
    }

    public function authSignUp(Request $request)
    {

        // Get current user timezone
        $myIp = $_SERVER['REMOTE_ADDR'];
        $myInfo = file_get_contents('http://ip-api.com/json/' . $myIp);
        $myInfo = json_decode($myInfo);
        $myTimezone = $myInfo->timezone;

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->company_name = $request->company;
        $user->timezone = $myTimezone;


        try {
            $user->save();
            Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('user.dashboard');
        } catch (\Exception $e) {
            return redirect()->route('user.signUp')->withErrors(["error" => "❌ Something is wrong, User not Registered!"]);
//            return redirect()->route('user.signUp')->withErrors(["error" => $e->getMessage()]);
        }
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::save();
        return redirect()->route('home');

    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function profile()
    {

        return view('dashboard.user-profile');
    }

    public function updateProfile(profileInfoRequest $request)
    {
        $id = Auth::guard('web')->user()->id;
        $info = User::find($id);
        $info->first_name = $request->first_name;
        $info->last_name = $request->last_name;
        $info->email = $request->email;
        if ($request->password) {
            $info->password = Hash::make($request->first_name);
        }
        if ($request->company_name) {
            $info->company_name = $request->company_name;
        }
        $info->save();
        return back()->with('updateProfile', 'Profile Updated Successfully');
    }

    public function teams()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.teams', ['userDetails' => $userDetails]);
    }

    public function teamPlus()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.team-plus', ['userDetails' => $userDetails]);
    }

    public function organizations()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.organizations', ['userDetails' => $userDetails]);
    }

    public function manageUsers()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.manage-users', ['userDetails' => $userDetails]);
    }

    public function billing()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.billing', ['userDetails' => $userDetails]);
    }

    public function index()
    {
        $channels = LinkedChannel::where('user_id', Auth::user()->id)->first();
        return view('dashboard.index', compact('channels'));
    }

    public function scheduled()
    {
        // $social_posts = SocialPost::where([['user_id', auth()->user()->id], ['status', 'scheduled']])->orderByDesc('id')->get();
        $social_posts = SocialPost::where([['user_id', auth()->user()->id], ['status', 'scheduled']])->get();

        if ($social_posts->count() > 0) {

            return view('dashboard.scheduled-2', compact('social_posts'));

        } else {

            return view('dashboard.scheduled', compact('social_posts'));

        }
    }

    public function queued()
    {

        $social_posts = SocialPost::where([['user_id', auth()->user()->id], ['status', 'pending']])->orderByDesc('id')->get();

        return view('dashboard.queued', compact('social_posts'));

    }

    public function sent()
    {
        // $userId = Session::get('loginId');
        // $userDetails = User::where('id', $userId)->first();
        // return view('dashboard.sent', ['userDetails' => $userDetails]);

        $social_posts = SocialPost::where([['user_id', auth()->user()->id], ['status', 'published']])->orderByDesc('id')->get();

        return view('dashboard.sent', compact('social_posts'));

    }

    public function undelivered()
    {
        $social_posts = SocialPost::where([['user_id', auth()->user()->id], ['status', 'failed']])->orderByDesc('id')->get();

        return view('dashboard.undelivered', compact('social_posts'));
    }

    public function drafts()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.drafts', ['userDetails' => $userDetails]);
    }

    public function tasks()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.tasks', ['userDetails' => $userDetails]);
    }

    public function activity()
    {
        $channels = LinkedChannel::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('dashboard.activity', compact('channels'));
    }

    public function inbox()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.inbox', ['userDetails' => $userDetails]);
    }

    public function statistics()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.statistics', ['userDetails' => $userDetails]);
    }

    public function monitor()
    {
        $channels = LinkedChannel::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('dashboard.monitor', compact('channels'));
    }

    public function keywords()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.keywords', ['userDetails' => $userDetails]);
    }

    public function keywords5()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.keywords-5', ['userDetails' => $userDetails]);
    }

    public function hashtags()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.hashtags', ['userDetails' => $userDetails]);
    }

    public function search()
    {
        $userId = Session::get('loginId');
        $userDetails = User::where('id', $userId)->first();
        return view('dashboard.search', compact('userDetails'));
    }

    // Linked Channels Section Functions.
    public function channels()
    {

     
         $channels = LinkedChannel::where('user_id', auth()->id())->latest()->get();

        $selected_channels = array();
        
        foreach($channels as $key => $othChannel){
            $selected_channels[$key]['page_id'] = $othChannel['page_id'];
            $selected_channels[$key]['channel_type'] = $othChannel['channel_type'];
            $selected_channels[$key]['page_name'] = $othChannel['page_name'];
            $selected_channels[$key]['access_token'] = $othChannel['access_token'];
            $selected_channels[$key]['category'] = "";
            $selected_channels[$key]['image'] = $othChannel['imageToShow'];
            $selected_channels[$key]['secret'] = $othChannel['twitter_sceret'];
            $selected_channels[$key]['channelType'] = $othChannel['channel_type'];
        }
        
        
        return view('dashboard.channels', ['channels' => $selected_channels]);
    }

    public function storingChannels(Request $request)
    {

        // echo json_encode($request->pageListData); exit;

        $lists = $request->channelListData;
        $id = Auth::guard('web')->user()->id;
        foreach ($lists as $index => $list) {
            LinkedChannel::updateOrCreate(
                [
                    'user_id' => $id,
                    'page_id' => $list['id'],
                    'page_name' => $list['name']
                ],
                [
                    'access_token' => $list['access_token'],
                    'imageToShow' => $list['image'],
                    'twitter_sceret' => $list['secert'],
                    'channel_type' => $list['channelType']
                ]

            );
        }
        $selected_channels = array();
        $allChannels = LinkedChannel::where([
            ['user_id', Auth::guard('web')->user()->id],
            ['channel_type', '!=', "fb_group"],
        ])->orderBy('created_at', 'DESC')->get();

        foreach ($allChannels as $key => $othChannel) {

            $selected_channels[$key]['id'] = $othChannel['page_id'];
            $selected_channels[$key]['account'] = $othChannel['channel_type'];
            $selected_channels[$key]['name'] = $othChannel['page_name'];
            $selected_channels[$key]['access_token'] = $othChannel['access_token'];
            $selected_channels[$key]['category'] = "";
            $selected_channels[$key]['image'] = $othChannel['imageToShow'];
            $selected_channels[$key]['secert'] = $othChannel['twitter_sceret'];
            $selected_channels[$key]['channelType'] = $othChannel['channel_type'];


        }
        return response()->json([
            'status' => 200,
            'message' => 'Channels Linked Successfully',
            'data' => $selected_channels
        ]);

    }

    // -- Update user profile social media -- //
    public function updatingSocialMedia(Request $request)
    {
        $lists = $request->profile_details;
        // echo json_encode($lists); exit;
        $id = Auth::guard('web')->user()->id;
        if ($lists['type'] == "facebook_connect") {
            $dataForUpdate["fb_id"] = $lists['fb_id'];
            $dataForUpdate["facebook_connect"] = $lists['status'];
        } else if ($lists['type'] == "insta_connect") {

            $dataForUpdate["insta_connect"] = $lists['status'];
        }

        // -- updating session -- //
        Session::put($lists['type'], "Yes");
        Session::save();
        // -- updating session -- //

        $update_query = User::where("id", $id)->update($dataForUpdate);

        if ($update_query) {
            return response()->json([
                'status' => 200,
                'message' => 'Profile updated'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Error'
            ]);
        }


    }
    // -- Update user profile social media -- //
    


    // -- Get other social media except Facebook -- //
    public function getOtherSocialMedia()
    {
        $selected_channels = array();
        $otherChannels = LinkedChannel::where([
            ['user_id', Auth::guard('web')->user()->id],
            ['channel_type', '!=', "fb_page"],
            ['channel_type', '!=', "fb_group"],
        ])->get();

        foreach ($otherChannels as $key => $othChannel) {

            $selected_channels[$key]['id'] = $othChannel['page_id'];
            $selected_channels[$key]['account'] = $othChannel['channel_type'];
            $selected_channels[$key]['name'] = $othChannel['page_name'];
            $selected_channels[$key]['access_token'] = $othChannel['access_token'];
            $selected_channels[$key]['category'] = "";
            $selected_channels[$key]['image'] = $othChannel['imageToShow'];
            $selected_channels[$key]['secert'] = $othChannel['twitter_sceret'];
            $selected_channels[$key]['channelType'] = $othChannel['channel_type'];


        }


        if ($selected_channels) {
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $selected_channels
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'error'
            ]);
        }


    }

    // -- Get other social media except Facebook -- //
    /*
     *RESET PASSWORD METHODS
     */
    public function forgetPassword()
    {
        return view('dashboard.forget-password');
    }

    public function sendEmailForForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $token = rand(100000, 999999);
        $email = $request->email;
        Session::put('userResetPasswordEmail', $email);
        User::where('email', $email)->update(['verify_code' => $token]);
        Mail::to($email)->send(new ResetPassword($token, $email));
        return redirect()->route('user.verifyCode')->withErrors(['codeSent' => 'We have sent you a 6 Digit-Code on your Email Address']);
    }

    public function verifyCode()
    {
        return view('dashboard.verify-code');
    }

    public function submitVerificationCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);
        $userEmail = Session::get('userResetPasswordEmail');
        $userDetails = User::where('email', $userEmail)->first();
        if ($userDetails) {
            if ($userDetails->verify_code == $request->code) {
                return redirect()->route('user.resetPassword');
            } else {
                return back()->with('error', 'Invalid Verification Code!');
            }
        }
    }

    public function resendCode(Request $request)
    {
        $token = rand(100000, 999999);
        $email = Session::get('userResetPasswordEmail');
        User::where('email', $email)->update(['verify_code' => $token]);
        Mail::to($email)->send(new ResetPassword($token, $email));
        return redirect()->route('user.verifyCode')->withErrors(['codeSent' => 'We have sent you a 6 Digit-Code on your Email Address']);
    }

    public function resetPassword()
    {
        return view('dashboard.reset-password');
    }

    public function updateResetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed'
        ]);

        $userEmail = Session::get('userResetPasswordEmail');

        User::where('email', $userEmail)->update(['password' => Hash::make($request->password), 'verify_code' => null]);

        return redirect()->back()->withErrors(['success' => "Your password has been changed Successfully, <a href=" . route('user.signIn') . " style='text-decoration: underline'>Sign In</a> now"]);

    }




    
    public function retryFailedPosts(Request $req)
    {
        $id = $req->post_id;
        SocialPost::where('id', $id)->update(['status' => 'pending']);
        return redirect()->back();
    }



}
