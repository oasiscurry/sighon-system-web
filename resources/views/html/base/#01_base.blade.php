<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('css')
  <title>sighon-system</title>
</head>

<body id="page-top">

  <!-- 背景 -->
  <div class="background"><canvas id="background"></canvas></div>

  <!-- ナビゲーションメニュー -->
@yield('menu')

  <!-- トップ -->
@yield('top')

  <!-- About Section -->
@yield('about')

  <!-- Works Section -->
@yield('works')

  <!-- Contact Section -->
@yield('contact')

  <!-- Notices Section modal-dialog-->
@yield('notices')

  <!-- フッター -->
@yield('footer')

@yield('js')
</body>

</html>
