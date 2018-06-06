    <link rel="stylesheet" href="css/style.css">
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
      <ul>
        <li><a class="active" href="index.php">HOME</a></li>
        <?php
        if (!$loggedIn) {
        ?>
        <li><a href="#">LOG IN</a></li>
        <li><a href="#">SIGN UP</a></li>
        <?php
        }
        ?>
        <li><a href="#">DOWNLOAD</a></li>
        <li><a href="#">DEVLOG</a></li>
      </ul>
    </header>
