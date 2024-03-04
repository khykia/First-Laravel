<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Navigation Bar</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/student/all">Students</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kelas/all">Kelas</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a class="dropdown-item" href="/dashboard/student/all">
                          <i class="bi bi-layout-text-sidebar-reverse"></i>
                          My Dashboard
                      </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                      <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="dropdown-item">
                              <i class="bi bi-box-arrow-right"></i> 
                              Logout
                          </button>
                      </form>
                  </li>
              </ul>
          </li>
          @else
          <li class="nav-item">
              <a href="/login/index" class="nav-link">
                  <i class="bi bi-box-arrow-right"></i> Login
              </a>
          </li>
          @endauth
       </ul>   
  </div>
</div>
</nav>
</body>
</html>