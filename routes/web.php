<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\ChannelsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\User\FacebookController;
use App\Http\Controllers\User\TwitterController;
use App\Http\Controllers\User\InstagramController;
use App\Http\Controllers\User\PinterestController;
use App\Http\Controllers\User\LinkedinController;
use App\Http\Controllers\User\CronJobsController;
use App\Http\Controllers\User\RedditController;

use WaleedAhmad\Pinterest\Facade\Pinterest;
use App\Helpers\Helper;

use App\Http\Middleware\IsUser;

// Route only for testing purpose
Route::get('/test', [CronJobsController::class, 'test']);




//LINKEDIN ROUTES from official Microsoft site
Route::get('/linkedin/login', [LinkedinController::class, 'linkedinLogin'])->name('linkedin.login')->middleware(isUser::class);
Route::get('/linkedin/callback', [LinkedinController::class, 'linkedinCallback'])->name('linkedin.callback')->middleware(isUser::class);
Route::post('/linkedin/post', [LinkedinController::class, 'postToLinkedIn'])->name('linkedin.post')->middleware(isUser::class);


//REDDIT ROUTES from official Microsoft site
Route::get('/reddit/login', [RedditController::class, 'redditLogin'])->name('reddit.login')->middleware(isUser::class);
Route::get('/reddit/callback', [RedditController::class, 'redditCallback'])->name('reddit.callback')->middleware(isUser::class);
Route::post('/reddit/post', [RedditController::class, 'postToReddit'])->name('reddit.post')->middleware(isUser::class);

Route::post('/reddit/moderator', [RedditController::class, 'moderator'])->name('reddit.moderator')->middleware(isUser::class);


//PINTEREST ROUTES from official pinterest developers site
Route::get('/pinterest/login', [PinterestController::class, 'redirectToPinterestProvider'])->name('pinterest.login')->middleware(isUser::class);
Route::get('/pinterest/callback', [PinterestController::class, 'handlePinterestProviderCallback'])->name('pinterest.callback')->middleware(isUser::class);
Route::post('/pinterest/getboards', [PinterestController::class, 'getUserBoards'])->name('pinterest.getUserBoards')->middleware(isUser::class);
Route::post('/pinterest/create-new-board', [PinterestController::class, 'createNewBoard'])->name('pinterest.createNewBoard')->middleware(isUser::class);


//FACEBOOK ROUTES FROM facebook/graph-sdk
Route::get('/facebook/login', [FacebookController::class, 'facebookLogin'])->name('facebook.login')->middleware(isUser::class);
Route::get('/facebook/callback', [FacebookController::class, 'facebookCallback'])->name('facebook.callback')->middleware(isUser::class);



//NSTAGRAM ROUTES FROM facebook/graph-sdk
Route::get('/instagram/login', [InstagramController::class, 'instagramLogin'])->name('instagram.login')->middleware(isUser::class);
Route::get('/instagram/callback', [InstagramController::class, 'instagramCallback'])->name('instagram.callback')->middleware(isUser::class);




//TWITTER ROUTES FROM https://github.com/atymic/twitter
Route::get('/twitter/login', [TwitterController::class, 'twitterLogin'])->name('twitter.login');
Route::get('/twitter/callback', [TwitterController::class, 'twitterCallback'])->name('twitter.callback');
Route::get('/twitter/error', [TwitterController::class, 'twitterError'])->name('twitter.error');
Route::get('/twitter/logout', [TwitterController::class, 'twitterLogout'])->name('twitter.logout');

//TWITTER ROUTES FROM ABRAHAM
Route::get('/twitter/tweet', [TwitterController::class, 'twitterTweet'])->name('twitter.tweet');


// Cron Jobs
Route::get('/cron/scheduled-posts', [CronJobsController::class, 'scheduledPosts']); // Runs after every minute on server
Route::get('/cron/pending-posts', [CronJobsController::class, 'pendingPosts']); // Runs after every minute on server
Route::get('/cron/reset-posts-limit', [CronJobsController::class, 'resetPostsLimit']); // Runs after every hour on server



/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/publish-scheduling', [HomeController::class, 'publish_scheduling']);
Route::get('/collaborate', [HomeController::class, 'collaborate']);
Route::get('/analytics', [HomeController::class, 'analytics']);
Route::get('/listen-monitor', [HomeController::class, 'listen_monitor']);
Route::get('/great-reports', [HomeController::class, 'great_reports']);
Route::get('/engage', [HomeController::class, 'engage']);
Route::get('/why-us', [HomeController::class, 'why_us']);
Route::get('/our-team', [HomeController::class, 'our_team']);
Route::get('/case-studies', [HomeController::class, 'case_studies']);
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/stop-dashboard', [HomeController::class, 'stopDashboard']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('termsAndConditions');


/*
|--------------------------------------------------------------------------
| USER DASHBOARD ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {

    Route::get('/signin', [UserController::class, 'signIn'])->name('user.signIn');
    Route::post('/signin', [UserController::class, 'authSignIn']);
    Route::get('/signup', [UserController::class, 'signUp'])->name('user.signUp');
    Route::post('/signup', [UserController::class, 'authSignUp']);

    // User forget Password and Reset Routes...
    Route::get('forget-password', [UserController::class, 'forgetPassword'])->name('user.forgetPassword');
    Route::post('forget-password', [UserController::class, 'sendEmailForForgetPassword']);
    Route::get('verify-code', [UserController::class, 'verifyCode'])->name('user.verifyCode');
    Route::post('verify-code', [UserController::class, 'submitVerificationCode']);
    Route::get('resend-code', [UserController::class, 'resendCode'])->name('user.resendCode');
    Route::get('reset-password', [UserController::class, 'resetPassword'])->name('user.resetPassword');
    Route::post('reset-password', [UserController::class, 'updateResetPassword']);

    Route::middleware([isUser::class])->group(function () {

        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/teams', [UserController::class, 'teams'])->name('user.teams');
        Route::get('/organizations', [UserController::class, 'organizations'])->name('user.organizations');
        Route::get('/manage-users', [UserController::class, 'manageUsers'])->name('user.manageUsers');
        Route::get('/billing', [UserController::class, 'billing'])->name('user.billing');
        Route::get('/statistics', [UserController::class, 'statistics'])->name('user.statistics');
        Route::get('/inbox', [UserController::class, 'inbox'])->name('user.inbox');
        Route::get('/keywords', [UserController::class, 'keywords'])->name('user.keywords');
        Route::get('/hashtags', [UserController::class, 'hashtags'])->name('user.hashtags');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/channels', [UserController::class, 'channels'])->name('user.channels');
        Route::get('/monitor', [UserController::class, 'monitor'])->name('user.monitor');
        Route::get('/hashtags', [UserController::class, 'hashtags'])->name('user.hashtags');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/activity', [UserController::class, 'activity'])->name('user.activity');
        Route::get('/inbox', [UserController::class, 'inbox'])->name('user.inbox');
        Route::get('/statistics', [UserController::class, 'statistics'])->name('user.statistics');
        Route::get('/scheduled', [UserController::class, 'scheduled'])->name('user.scheduled');
        Route::get('/queued', [UserController::class, 'queued'])->name('user.queued');
        Route::get('/sent', [UserController::class, 'sent'])->name('user.sent');
        Route::get('/undelivered', [UserController::class, 'undelivered'])->name('user.undelivered');
        Route::get('/drafts', [UserController::class, 'drafts'])->name('user.drafts');
        Route::get('/tasks', [UserController::class, 'tasks'])->name('user.tasks');
        //Route::get('/team-plus', [UserController::class, 'teamPlus'])->name('user.teamPlus');
        //Route::get('/keywords-5', [UserController::class, 'keywords5'])->name('user.keywords5');


        Route::post('/retry-failed-posts', [UserController::class, 'retryFailedPosts'])->name('user.retryFailedPosts');
        
        //CHANNELS
        Route::post('/post-to-social-media', [ChannelsController::class, 'postToSocialMedia'])->name('postToSocialMedia');
        Route::post('/upload_image', [ChannelsController::class, 'socialUploadImage'])->name('socialUploadImage');





        // Linked Channels Section Routes
//        Route::get('/linked-channels', [UserController::class, 'linked'])->name('user.linked');
//        Route::post('/store/channels', [UserController::class, 'storingChannels'])->name('channels.store');
//        Route::post('/update/updatingSocial', [UserController::class, 'updatingSocialMedia'])->name('social.update');
//        Route::get('/get/otherSocial', [UserController::class, 'getOtherSocialMedia'])->name('otherSocialMedia.get');

        //Route::post('/upload_image', [UserController::class, 'upload_image'])->name('user.upload_image');

        // Admin Dashboard Routes
        //Route::post('/upload_image', [UserController::class, 'upload_image']);

    });
});



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authLogin'])->name('admin.authLogin');

    //ROUTES FOR ADMIN REGISTRATION
    //Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    //Route::post('/register', [AdminController::class, 'authRegister'])->name('admin.authRegister');


    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('/datatable', [AdminController::class, 'datatable'])->name('admin.datatable');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    });

});
