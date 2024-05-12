<!DOCTYPE html>
<html>
<head>
    <title>Admin Auth Laravel 8 </title>
</head>
<body>
    <div class="container">
        <p>Welcome, {{ session('id_admin') }}</p>
    </div>

    <form action="{{ route('adminLogoutPost') }}" method="post">
        @csrf
        <button type="submit" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i>Logout</button>
    </form>

   
</body>
</html>