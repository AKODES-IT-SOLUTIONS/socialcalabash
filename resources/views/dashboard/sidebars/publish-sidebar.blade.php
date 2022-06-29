@php

// For Pending Posts Count
$pending_posts_count = \DB::table('social_posts')->where([['user_id', auth()->user()->id], ['status', 'pending']])->count();

// For Scheduled Posts Count
$scheduled_posts_count = \DB::table('social_posts')->where([['user_id', auth()->user()->id], ['status', 'scheduled']])->count();

// For Failed Posts Count
$failed_posts_count = \DB::table('social_posts')->where([['user_id', auth()->user()->id], ['status', 'failed']])->count();

@endphp

<div class="sidebar">
    <div class="page-name">
        <p>Publish</p>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><a href="{{ route('user.dashboard') }}">calender</a></li>
            
            <li class="{{ request()->routeIs('user.scheduled') ? 'active' : '' }}">
                <a href="{{ route('user.scheduled') }}">
                    scheduled 
                    @if (!empty($scheduled_posts_count))
                    <span style="color: #055696; border-radius: 100%; background-color: white; padding: 0 5px; font-weight: 800; font-size: 15px">
                        {{ $scheduled_posts_count }}
                    </span>
                    @endif
                </a>
            </li>
            
            <li class="{{ request()->routeIs('user.queued') ? 'active' : '' }}">
                <a href="{{ route('user.queued') }}">
                    queued 
                    @if (!empty($pending_posts_count))
                        <span style="color: #055696; border-radius: 100%; background-color: white; padding: 0 5px; font-weight: 800; font-size: 15px">
                            {{ $pending_posts_count }}
                        </span>
                    @endif
                </a>
            </li>
            
            <li class="{{ request()->routeIs('user.sent') ? 'active' : '' }}"><a href="{{ route('user.sent') }}">sent</a></li>
            
            <li class="{{ request()->routeIs('user.undelivered') ? 'active' : '' }}">
                <a href="{{ route('user.undelivered') }}">
                    undelivered
                    @if (!empty($failed_posts_count))
                        <span style="color: #055696; border-radius: 100%; background-color: white; padding: 0 5px; font-weight: 800; font-size: 15px">
                            {{ $failed_posts_count }}
                        </span>
                    @endif
                </a>
            </li>
            
            <li class="{{ request()->routeIs('user.drafts') ? 'active' : '' }}"><a href="{{ route('user.drafts') }}">drafts</a></li>
            <li class="{{ request()->routeIs('user.tasks') ? 'active' : '' }}"><a href="{{ route('user.tasks') }}">tasks</a></li>
        </ul>
    </div>
    <div class="compose-btn">
        <button id="composeBtn"><i class="fa fa-plus"></i> compose</button>
    </div>
</div>
