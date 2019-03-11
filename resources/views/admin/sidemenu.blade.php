
  <div class="sidebar-header">
    <h3>Bootstrap Sidebar</h3>
</div>
<ul class="list-unstyled components">
    <p>
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </p>
    <li class="{{ (Request::is('admin/category*') ? 'active' : '') }}">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Danh mục</a>
        <ul class="collapse list-unstyled {{ (Request::is('admin/category*') ? 'show' : '') }}" id="homeSubmenu">
            <li>
                <a href="{{ route('category.index',['type'=>'post']) }}">Danh mục post</a>
            </li>
        </ul>
    </li>
    <li class="{{ (Request::is('admin/post*') ? 'active' : '') }}">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle  ">Post</a>
        <ul class="collapse list-unstyled {{ (Request::is('admin/post*') ? 'show' : '') }}" id="pageSubmenu">
            <li>
                <a href="{{ route('post.index',['type'=>'post']) }}">Post</a>
            </li>
        </ul>
    </li>
    <li >
        <a href="#">Setting</a>
    </li>
    <li>
        <a href="#">Portfolio</a>
    </li>
    <li>
        <a href="#">Contact</a>
    </li>
</ul>