<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home">Job</a>
    </div>
    <!-- left side of navbar -->
    <ul class="nav navbar-nav">
      <li ><a href="/home">Dashboard</a></li>
      <li><a href="/jobposts">Job Post</a></li>
    </ul>
    <!-- end left side -->
    <!-- right side nav bar -->
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
    <!-- end right side of navbar -->
  </div>
</nav>