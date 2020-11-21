<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Web 应用') - Laravel学习</title>
  <link rel="stylesheet" href="css/app.css"></link>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Web 应用</a>
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item"><a class="nav-link" href="/help">帮助</a></li>
        <li class="nav-item"><a class="nav-link" href="#">登录</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    @yield('content')
    </div>
  </body>
</html>
