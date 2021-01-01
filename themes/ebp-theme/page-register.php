<?php get_header(); ?>

<div class="container" id="main">
  <div class="row">
    <div class="col">

      <form id="register-form">

        <div class="row">
          <label for="field-first-name">First Name</label>
          <input type="text" />
        </div>

        <div class="row">
          <label for="field-last-name">Last Name</label>
          <input type="text" />
        </div>

        <div class="row">
          <label for="field-email">Email</label>
          <input type="text" />
        </div>

        <input type="submit" value="Register" />

      </form>

    </div>
  </div>
</div>

<?php get_footer(); ?>
