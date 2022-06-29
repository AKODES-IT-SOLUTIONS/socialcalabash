<?php
 
namespace App\Http\Controllers\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\LinkedChannel;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PinterestController extends Controller
{
    public function redirectToPinterestProvider(){
        $client_id = env('PINTEREST_KEY');
        $client_secret = env('PINTEREST_SECRET');
        $redirect_uri = env('PINTEREST_REDIRECT_URI');

        $oauthUrl = "https://www.pinterest.com/oauth/?client_id={$client_id}&redirect_uri={$redirect_uri}&response_type=code&scope=boards:read,boards:write,pins:read,pins:write,user_accounts:read";

        return redirect($oauthUrl);
    }
 
    public function handlePinterestProviderCallback(){
        
        if(isset($_GET["code"])){

            $code = $_GET['code'];
            // -- Generating access token -- //
            $response = Helper::pinterestCurlGenerateToken($code, env('PINTEREST_REDIRECT_URI'), env('PINTEREST_KEY'), env('PINTEREST_SECRET'), "POST");
            $accessToken = $response->access_token;
            // -- Generating access token -- //

            // -- Geting pinintrest user details -- //
            $pintrest_users = Helper::pinterestGetRequest('user_account',$accessToken, "GET");
            // -- Geting pinintrest user details -- //
            
            // -- Store Data in Database -- //
            $channels[] = LinkedChannel::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'page_name' => $pintrest_users->username
                ],
                [
                    'user_id' => auth()->id(),
                    'page_name' => $pintrest_users->username,
                    'imageToShow' => $pintrest_users->profile_image,
                    'access_token' => $response->access_token,
                    'channel_type' => 'pinterest',
                    'created_at' => Carbon::now()
                ] 
            );
            // -- Store Data in Database -- //

            return redirect()->route('user.channels')->withErrors(['message' => "Your Pinterest account connected"]);
    
        } else {
            return Redirect::route('user.channels')
                ->withErrors('error', 'Crab! Something went wrong while signing you up!');
        }

    }

    public function getUserBoards(Request $request){
            $accessToken = $request->accesstoken;
            // -- Geting pinintrest user boards -- //
           // $accessToken = "pina_AEAZM5QWABVUMAIAGCAOKDSTTRJZTAABACGSOZSCK3MVAG4S4USL72QNAYH343DLBT5UVC4ZWZMZGOJSCKRN5SW3IQJXHLQA";
            $pintrest_users_boards = Helper::pinterestGetRequest('boards', $accessToken, "GET");
            // -- Geting pinintrest user boards -- //

           // dd($pintrest_users_boards);

            if ($pintrest_users_boards) {
                return response()->json([
                    'status' => "success",
                    'items' => $pintrest_users_boards->items
                ]);
            } else {
                return response()->json([
                    'status' => "error",
                    'message' => 'Error'
                ]);
            }
    }

    public function createNewBoard(Request $request){

        $boardDescription = $request->board_description;
        $boardName = $request->board_name;
        $boardPrivacy = $request->board_privacy;
        $accessTokenPin = $request->access_token_pin;

        $boardPostData['name'] = $boardName;
        $boardPostData['description'] = $boardDescription;
        $boardPostData['privacy'] = $boardPrivacy;
        $jsonDataToPost = json_encode($boardPostData);
        // -- Creating user boards -- //
        $create_users_boards = Helper::pinterestPostRequest('boards', $accessTokenPin, "POST",$jsonDataToPost);
        // -- Creating user boards -- //
        if (isset($create_users_boards->id)) {
            return response()->json([
                'status' => "success",
                'items' => $create_users_boards,
                'token' => $accessTokenPin
            ]);
        } else {
            return response()->json([
                'status' => "error",
                'message' => $create_users_boards
            ]);
        }
    }

    public function createPin($access_token,$postPinData){
        
     
        $jsonDataToPost = json_encode($postPinData);

      
        // -- Creating user boards -- //
        $create_users_pins = Helper::pinterestPostRequest('pins', $access_token, "POST",$jsonDataToPost);
        // -- Creating user boards -- //
        if (!isset($create_users_pins->code)) {
            return [
                'status' => "success",
                'items' => $create_users_pins,
            ];
        } else {
            return [
                'status' => "error",
                'message' => $create_users_pins->message
            ];
        }
    }

}