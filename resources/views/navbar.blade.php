
<style>
    
        

    .navbar-white .navbar-brand {
  color: gray;
  font-size : 18px;
  padding : 0 2rem
  margin:0 1rem;
}

.navbar-white .navbar-brand:hover,
.navbar-white .navbar-brand:focus {
  color: orange;
}

.navbar-white .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 1.0);
  font-size : 15px;
  padding-left : 1rem;
  padding-right : 1rem;
  margin:0 0.5rem;
}

.navbar-white .navbar-nav .nav-link:hover,
.navbar-white .navbar-nav .nav-link:focus {
  color: orange;
  
  border: 1px none white;
  background-color : gray;
}

.navbar-white .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.3);
}

.navbar-white .navbar-nav .show > .nav-link,
.navbar-white .navbar-nav .active > .nav-link,
.navbar-white .navbar-nav .nav-link.show,
.navbar-white .navbar-nav .nav-link.active {
  color: orange;
  border : 1px solid white;
  background-color : gray;
}

.navbar-white .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.1);
}

.navbar-white .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.navbar-white .navbar-text {
  color: rgba(255, 255, 255, 0.5);
}

.navbar-white .navbar-text a {
  color: rgba(255, 255, 255, 0.9);
}

.navbar-white .navbar-text a:hover,
.navbar-white .navbar-text a:focus {
  color: orange;
}

</style>
<nav class="navbar navbar-expand-sm navbar-white bg-dark mr-auto">
   
        
        <a class="navbar-brand" href="#">博客</a>
                
        <ul class="navbar-nav ">
            <li class="nav-item "><a @if(Request::is('post' )) class="nav-link active" @else class="nav-link" @endif href="/">首页</a></li>
            @auth
                <li class="nav-item"><a @if(Request::is('admin/post/create' ) ) class="nav-link active" @else class="nav-link" @endif  href="/admin/post/create">新文章</a></li>
                <li class="nav-item"><a @if(Request::is('admin*' ) && !Request::is('admin/post/create' )) class="nav-link active" @else class="nav-link" @endif  href="/admin/post">管理</a></li>
                <li class="nav-item"><a @if(Request::is('contact*' )) class="nav-link active" @else class="nav-link" @endif  href="#">联系</a></li>
            @endauth
        </ul>
        
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item"><a class="nav-link" href="/login">登录</a></li> 
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar_dropdwon" data-toggle="dropdown">
                        {{Auth::user()->username}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/logout">登出</a>
                    </div>
                </li>
            @endguest
        </ul>
    
</nav>