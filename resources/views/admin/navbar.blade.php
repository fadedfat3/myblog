
<div class="container" style="margin-top:20%" >

<ul class="list-group">
    @auth
        <li @if (Request::is('admin/post*')) class="list-group-item list-group-item-success" @else class="list-group-item" @endif>
            <a class="nav-link" href="/admin/post">文章</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="list-group-item list-group-item-success" @else class="list-group-item" @endif>
            <a class="nav-link" href="/admin/tag">标签</a>
        </li>
        <li @if (Request::is('admin/upload*')) class="list-group-item list-group-item-success" @else class="list-group-item" @endif>
            <a class="nav-link" href="/admin/upload">文件</a>
        </li>
    @endauth
</ul>

</div>

