$('#ponto').submit((e) => {
  e.preventDefault();

  var form = $('#ponto'); // Store the jQuery form object
  var formData = new FormData(form[0]); // Pass the DOM element to FormData

  // Log each key-value pair from formData
  formData.forEach((value, key) => {
      console.log(key, value);
  });

  $.ajax({
      url: '/sucata/controler/cadastrarPonto.php',
      method: 'POST',
      data: formData,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: (data) => {
          alert(data);
      },
      error: (errorMessage) => {
          $('.result').empty().prepend(errorMessage);
      }
  }).done(function (result) {
      console.log(formData)
      // Your additional code here, if any
  });

});
