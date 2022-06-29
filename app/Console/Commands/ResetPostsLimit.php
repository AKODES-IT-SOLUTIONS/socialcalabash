<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\User\TwitterController;
use App\Http\Controllers\User\FacebookController;
use App\Http\Controllers\User\InstagramController;
use App\Http\Controllers\User\PinterestController;
use App\Http\Controllers\User\LinkedinController;
use App\Models\SocialPost;
use App\Models\LinkedChannel;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ResetPostsLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ResetPostsLimit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('linked_channels')->update(['posting_limit_reach' => 0]);

        return 0;
    }
}
