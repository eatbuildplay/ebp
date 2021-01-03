<?php get_header(); ?>

<div class="container" id="main">
  <div class="row mb-5">
    <div class="col-md-6 offset-md-3">

      <h2 class="mb-3">Account Registration</h2>

      <form method="post" id="register-form">

        <div class="mb-3">
          <label class="form-label" for="field-first-name">First Name</label>
          <input id="field-first-name" class="form-control" type="text" />
        </div>

        <div class="mb-3">
          <label class="form-label" for="field-last-name">Last Name</label>
          <input id="field-last-name" class="form-control" type="text" />
        </div>

        <div class="mb-3">
          <label class="form-label" for="field-email">Email</label>
          <input id="field-email" class="form-control" type="text" />
        </div>

        <div class="mb-3">
          <label class="form-label" for="field-email">Company Name</label>
          <input id="field-company-name" class="form-control" type="text" />
        </div>

        <div class="mb-3 mt-4 form-check">
          <input type="checkbox" class="form-check-input" id="field-terms-conditions">
          <label class="form-check-label" for="field-terms-conditions">Accept the <a href="<?php print site_url('terms'); ?>">Terms & Conditions</a></label>
        </div>

        <button class="btn btn-secondary" type="submit">Open Account</button>

      </form>

    </div>
  </div>
</div>

<?php get_footer(); ?>
