<?php
  function activeUrl($url) {
    if ($_SERVER['REQUEST_URI'] == $url) {
      return true;
    }
    return false;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Admin</title>
    <meta name="description" content="">
    <meta name="author" content="VK Media">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-87DrmpqHRiY8hPLIr7ByqhPIywuSsjuQAfMXAE0sMUpY3BM7nXjf+mLIUSvhDArs" crossorigin="anonymous"> -->

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    @yield('styles')
  </head>
  <body id="dashboard">
    <header>
      <nav id="top_nav">
        <div class="left">
          <div class="toggle">
            <div></div>
            <div></div>
            <div></div>
          </div>

          <div class="logo"><img src="{{ asset('uploads/logo.png') }}" alt="Company Logo"></div>

          <div class="divider"></div>

          <div class="search">
            <input type="text" placeholder="Search">
            <i class="fal fa-search"></i>
          </div>
        </div>

        <div class="right">
          <button class="btn">New</button>
          <div class="avatar" style="background-image: url('{{ Auth::user()->photo ? Auth::user()->photo->file : 'http://via.placeholder.com/50x50' }}');"></div>
          <div class="userMenu">
            <div class="triangle"></div>
            <div class="links">
              <a href="#">My Profile</a>
              <a class="logout" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
        </div>
      </nav>

      <nav id="side_nav">
        <div class="top">
          <div class="nav_link_container <?php echo activeUrl('/admin') ? 'active' : null ?>">
            <a href="/admin"><i class="fal fa-tachometer-alt"></i> <span>Dashboard</span></a>
          </div>

          <div class="nav_link_container <?php echo activeUrl('/admin/users') ? 'active' : null ?>">
            <a href="#"><i class="fal fa-users"></i> <span>Users</span></a>
            <div class="subMenu">
              <a href="{{ route('users.index') }}">All Users</a>
              <a href="{{ route('users.create') }}">Create User</a>
            </div>
          </div>

          <div class="nav_link_container <?php echo activeUrl('/admin/posts') ? 'active' : null ?>">
            <a href="#"><i class="fal fa-copy" style="margin-left: 3px;"></i> <span>Posts</span></a>
            <div class="subMenu">
              <a href="{{ route('posts.index') }}">All Posts</a>
              <a href="{{ route('posts.create') }}">Create Post</a>
            </div>
          </div>

          <div class="nav_link_container <?php echo activeUrl('/admin/categories') ? 'active' : null ?>">
            <a href="#"><i class="fal fa-tags"></i> <span>Categories</span></a>
            <div class="subMenu">
              <a href="{{ route('categories.index') }}">All Categories</a>
              <a href="{{ route('categories.create') }}">Create Category</a>
            </div>
          </div>

          <div class="nav_link_container <?php echo activeUrl('/admin/media') ? 'active' : null ?>">
            <a href="#"><i class="fal fa-images"></i> <span>Media</span></a>
            <div class="subMenu">
              <a href="{{ route('media.index') }}">All Media</a>
              <a href="{{ route('media.create') }}">Upload Media</a>
            </div>
          </div>

          <div class="nav_link_container <?php echo activeUrl('/admin/comments') ? 'active' : null ?>">
            <a href="#"><i class="fal fa-comments"></i></i> <span>Comments</span></a>
            <div class="subMenu">
              <a href="{{ route('comments.index') }}">All Comments</a>
            </div>
          </div>
        </div>

        <div class="bottom">
          <div class="nav_link_container">
            <a href="#"><i class="fal fa-cog"></i> <span>Settings</span></a>
          </div>

          <div class="nav_link_container">
            <a href="#"><i class="fal fa-question-circle"></i> <span>Help</span></a>
          </div>
        </div>
      </nav>
    </header>

    <main>
      @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    @yield('script')
  </body>
</html>
