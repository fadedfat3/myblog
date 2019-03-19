
<ul class="navbar-nav mr-auto">
    @auth
        <li @if (Request::is('admin/post/*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/admin/post">文章</a>
        </li>
        <li @if (Request::is('admin/tag/*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/admin/tag">标签</a>
        </li>
        <li @if (Request::is('admin/upload/*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/admin/upload">文件</a>
        </li>
    @endauth
</ul>


