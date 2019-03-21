
<style>
    
</style>
<nav class="navbar navbar-expand-sm navbar-light bg-info mr-auto">
   
        
        <a class="navbar-brand" href="#">博客</a>
                
        <ul class="navbar-nav ">
            <li class="nav-item "><a class="nav-link" href="/">首页</a></li>
            @auth
                <li class="nav-item"><a class="nav-link" href="/admin/post/create">新文章</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/post">管理</a></li>
                <li class="nav-item"><a class="nav-link" href="#">联系</a></li>
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