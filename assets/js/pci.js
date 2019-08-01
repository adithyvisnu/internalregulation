$(document).ready(function() {
  $('.button-collapse').sideNav();
  
  $('select').material_select();
  
  $('.datepicker').pickadate({
    format: 'dd-mm-yyyy',
  });

  tinymce.init({
    selector: 'textarea',
    plugins : 'advlist autolink link lists charmap print preview'
  });
});