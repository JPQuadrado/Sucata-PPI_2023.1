function popup() {
    $('#confirmDeleteModal').modal('show');
  }

  // Add your delete account logic here when the "Sim, excluir" button is clicked
  $('#deleteAccountButton').click(function() {
    // You can add your delete account logic here
    // For now, I'm just closing the modal
    $('#confirmDeleteModal').modal('hide');
  });