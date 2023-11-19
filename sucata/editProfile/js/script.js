function popup() {
    $('#confirmDeleteModal').modal('show');
  }

  // Add your delete account logic here when the "Sim, excluir" button is clicked
  $('#deleteAccountButton').click(function() {
    // You can add your delete account logic here
    // For now, I'm just closing the modal
    $('#confirmDeleteModal').modal('hide');
  });


$('#editForm').submit((e) => {
    e.preventDefault();

    var form = $('#editForm'); // Store the jQuery form object
    var formData = new FormData(form[0]); // Pass the DOM element to FormData

    // Log each key-value pair from formData
    formData.forEach((value, key) => {
        console.log(key, value);
    });

    $.ajax({
        url: '/sucata/controler/editProfile.php',
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
    });

});