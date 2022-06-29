<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;


class ForgotPasswordController extends Controller
{

/** FORGET PASSWORD FOR USER**/

    public function forgetPassword(){
      return view('dashboard.forget-password');
    }
    public function sendEmailForForgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $token = random_int(100000,999999);
        $email =   $request->email;
        $request->session()->put('userPasswordResetEmail', $email);
        DB::table('users')->where('email', $email )->update(['verify_code' => $token,]);
        Mail::to($email)->send(new ResetPassword($token, $email));
        return redirect('/verify/code/email')->with('codeSent', 'We have sent you a 6 Digit-Code on your Email Address');




          // return redirect()->back()->with('codeSent','We have sent you a 6 Digit-Code on your Email Address');
          // $toEmail = $userEmail;
          // $subject = "Social Calabash Password Reset OTP";
          // $message = "Greetings,
          //                   Hey '".$userEmail."', did you want to reset your password?.<br>
          //                 Here is Your 6-Digit Password Reset OTP.<h4> '".$token."'</h4> . <br>
          //                  Kindly Do Not Share it with anyone.<br><br>
          //                  Regards, <br>
          //                   Social Calabash";
          //      $headers = "MIME-Version: 1.0" . "\r\n";
          //      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          //      // More headers
          //      $headers .= 'From: <support@calabasg.com.com>' . "\r\n";

          //      $mail = mail($toEmail, $subject, $message, $headers);
    }


      public function admingetEmail(){
          return view ('admin.adminemailForm');
              }
              public function adminpostEmail(Request $request){
                  $request->validate([
                      'email' => 'required|email|exists:admins',
                  ]);

                  $token = random_int(100000,999999);
                  // $token = Str::random(4);

                    $userEmail =   $request->email;

                    DB::table('admins')->where('email', $userEmail )->update(['verify_code' => $token,]);

                    $request->session()->put('passwordResetEmail', $adminEmail);

                    /* $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From: <support@eigix.com>' . "\r\n";
                    $mail = mail($to, $subject, $message, $headers);
                  // $mail = mail($adminEmail, $subject, $message, $headers);
                    return $mail; */
                  return redirect('/admin/verify/code')->with('message', 'We have send a 4 digit Code in your Email Address');
      }

      public function reSendCode(Request $request){
        $token = random_int(100000,999999);
        $email =  Session::get('userPasswordResetEmail');
        DB::table('users')->where('email', $email )->update(['verify_code' => $token,]);
        Mail::to($email)->send(new \App\Mail\ResetPassword($token , $email));
        return redirect()->back()->with('codeSent','We have sent you a 6 Digit-Code on your Email Address');







        // $userEmail =  Session::get('userPasswordResetEmail');
        // DB::table('users')->where('email', $userEmail )->update(['verify_code' => $token,]);
        //   $toEmail = $userEmail;
        //   $subject = "Social Calabash Password Reset OTP";
        //   $message = "Greetings,
        //                     Hey '".$userEmail."', did you want to reset your password?.<br>
        //                   Here is Your 6-Digit Password Reset OTP.<h4> '".$token."'</h4> . <br>
        //                    Kindly Do Not Share it with anyone.<br><br>
        //                    Regards, <br>
        //                     Social Calabash";
        //        $headers = "MIME-Version: 1.0" . "\r\n";
        //        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //        // More headers
        //        $headers .= 'From: <support@calabash.com>' . "\r\n";

        //        $mail = mail($toEmail, $subject, $message, $headers);
        //        if($mail){
        //         return redirect('/verify/code/email')->with('codeSent', 'We have sent you a 6 digit Code on your Email Address');
        //        }else{
        //          return "Error";
        //        }
    }

        /** END FORGET PASSWORD FOR ADMIN**/
}
