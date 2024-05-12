<!DOCTYPE html>
<html>
<head>
    <title>Admin Auth Laravel 8 </title>
</head>
<body>
    <p>{{ Auth::guard('admin')->check() }}</p>
  
    @if (Auth::guard('admin')->check())
    <div class="container">
        Welcome, {{ Auth::guard('admin')->user()->username }}
    </div>

    <form action="{{ route('adminLogoutPost') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</button>
    </form>
    @else
        <p>AAAAAAAAAaa</p>
    @endif

   
</body>
</html>