    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
    crossorigin="anonymous">
    </script>
    <script type="text/javascript">
      $ (window).on ('scroll', function () {
        if ($ (window).scrollTop ()) {
          $ ('header').addClass ('black');
        } else {
          $ ('header').removeClass ('black');
        }
      })
    </script>
  </head>
  <body>

    <header>
      <nav>
        <ul class="main">
          <li><a href="index.php">HOME</a></li>
          <a href="index.php"><img src="../../images/icons/home-icon.png"></img></a>
          <li><a href="#">DOWNLOAD</a></li>
          <a href="#"><img src="../../images/icons/download-icon.png"></img></a>
          <li><a href="#">DEVLOG</a></li>
          <a href="#"><img src="../../images/icons/devlog-icon.png"></img></a>
        </ul>

        <ul class="account">
          <?php
          if (!$loggedIn) {
          ?>
          <li class="text"><a href="../../login.php">LOG IN</a></li>
          <?php
          } else {
          ?>
          <li><a href="../../profile.php">ACCOUNT</a></li>
          <img src="../../images/icons/account-icon.png"></img>
          <?php
          }
          ?>
        </ul>
      </nav>
    </header>
