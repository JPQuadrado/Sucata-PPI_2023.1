// cliente
$('#cliente').submit((e) => {
    e.preventDefault();

    var form = $('#cliente'); // Store the jQuery form object
    var formData = new FormData(form[0]); // Pass the DOM element to FormData

    // Log each key-value pair from formData
    formData.forEach((value, key) => {
        console.log(key, value);
    });

    $.ajax({
        url: '/sucata/controler/cadastrarCliente.php',
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


    // $("#foto").change(function () {
    //     var foto = this.files[0];
    //     var fotoType = foto.type;
    //     var match = ['image/jpeg', 'image/png', 'image/jpg'];

    //     if (!(match.includes(fotoType))) {
    //         alert('Por favor, selecione um tipo de imagem válida (JPG, PNG ou JPEG)');
    //         $("#foto").val('');
    //         return false;
    //     }
    // });
});
