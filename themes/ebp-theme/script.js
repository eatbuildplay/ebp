jQuery(document).ready(function($) {


/*
 * Process Register Form
 * #register-form
 */

$('#register-form').submit( function(e) {

  e.preventDefault();

  let firstName = $('#field-first-name').val();
  let lastName = $('#field-last-name').val();
  let email = $('#field-email').val();
  let companyName = $('#field-company-name').val();
  
  let data = {
    firstName: firstName,
    lastName: lastName,
    email: email,
    companyName: companyName
  }

  wp.ajax.post('register_form_process', data).done( function( response ) {
    console.log( response )
  });

});




});
