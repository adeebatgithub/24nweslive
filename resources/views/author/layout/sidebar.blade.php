<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author_home') }}">Author Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('author_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('author/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('author/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_post_show') }}"><i class="fas fa-hand-point-right"></i> <span>Posts</span></a></li>

            <li class="{{ Request::is('author/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_photo_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Photo Gallery"><i class="fas fa-camera"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('author/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author_video_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Video Gallery"><i class="fas fa-video"></i> <span>Video Gallery</span></a></li>

        </ul>
    </aside>
</div>