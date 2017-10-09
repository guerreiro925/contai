function myFunction(x) {
  
    switch(x) {
    case 0:
        swal("Here's a message!");
        break;
    case 1:
        sweetAlert("Oops...", "Something went wrong!", "error");
        break;
    case 2:
        swal("Enviado com sucesso!", "Muito obrigado por nos enviar seu conto! Em breve você estará recebendo um feedback, assim como a publicação dele na nossa plataforma! Aguarde 5 segundos para retornar!", "success");
        break;
      case 3: 
        swal({   title: "Are you sure?",   text: "Your will not be able to recover this imaginary file!", textres:"", type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel plx!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     swal("Deleted!", "Your imaginary file has been deleted.", "success");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } });
        break;
  }
}