//notification timeout
$('div.alert-success').delay(6000).slideUp(300);
//Hide success message placeholder
$('.success-msg').hide();

//select2
$(document).ready(function() {
    $('.select2').select2();
});

//delete deleteModal
$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var item = button.data('item') // Item id
  var modal = $(this)
  modal.find('.modal-footer #deleteForm').attr("action", item)
});
$(document).ready( function () {
    $('#table_id').DataTable({
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      "pageLength": 50
    });
});
