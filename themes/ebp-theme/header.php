<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Eat/Build/Play WordPress Agency</title>

    <?php wp_head(); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </head>
  <body>

  <header class="site-header">
    <div class="container">
      <div class="row">
        <div class="col-md-4">

          <a href="<?php print site_url(); ?>">
            <img id="logo" src="<?php echo get_template_directory_uri(); ?>/assets/ebp-logo-full.png" />
          </a>

        </div>

        <div class="col-md-8">
          <nav id="main-menu">
            <ul>
              <li>
                <a href="<?php print site_url('register'); ?>">Register</a>
              </li>
              <li>
                <a href="<?php print site_url('explore'); ?>">Explore</a>
              </li>
              <li>
                <a href="<?php print site_url('login'); ?>">Login</a>
              </li>
            </ul>
          </nav>
        </div>

      </div><!-- ./row -->
    </div><!-- ./container -->
  </header>
