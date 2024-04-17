<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rentak Buku | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

    <div class="main d-flex justify-content-center flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: blue;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Rent books</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>            
            </div>
          </nav>

          {{-- {{request()->route()->uri}} --}}
          <div class="body-content h-100">
                <div class="row g-0 h-100">
                    <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
                        @if(Auth::user())
                            @if (Auth::user()->role_id == 1)
                                <a href="/dashboard" @if (request()->route()->uri == 'dashboard')
                                    class = "active"
                                @endif>Dashboard</a>
                                <a href="/books" @if (request()->route()->uri == 'books' || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-deleted' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-delete/{slug}')
                                    class = "active"
                                @endif>Books</a>
                                <a href="/categories" @if (request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-delete/{slug}')
                                    class = "active"
                                @endif>Categories</a>
                                <a href="/users" @if (request()->route()->uri == 'users' || request()->route()->uri == 'user-registered' || request()->route()->uri == 'user-register/{slug}' || request()->route()->uri == 'user-banned' || request()->route()->uri == 'user-ban/{slug}')
                                    class = "active"
                                @endif>Users</a>
                                <a href="/book-rent" @if (request()->route()->uri == 'book-rent')
                                    class = "active"
                                @endif>Book Rent</a>
                                <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs')
                                    class = "active"
                                @endif>Rent Log</a>
                                <a href="/" @if (request()->route()->uri == '/')
                                    class = "active"
                                @endif>Book List</a>
                                <a href="/logout">Logout</a>
                            @else
                                <a href="profile" @if (request()->route()->uri == 'profile')
                                    class = "active"
                                @endif>Profile</a>
                                <a href="/" @if (request()->route()->uri == '/')
                                    class = "active"
                                @endif>Book List</a>
                                <a href="/logout">Logout</a>
                            @endif
                        @else
                        <a href="login" @if (request()->route()->uri == 'login')
                            class = "active"
                        @endif>Login</a>                        
                        @endif
                    </div>
                    <div class="content col-lg-10 p-5">
                        @yield('content')
                    </div>
                </div>
          </div>
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>