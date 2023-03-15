function viewModal(el) {
  $.ajax({
    type: "GET",
    url: "get_masterlist.php",
    data: {"barcode": String(el.getAttribute("data-id"))},
    dataType: "JSON",
    success: function(data) {
      $(".barcode-modal").val(data.barcode);
      $(".desc-modal").val(data.description);
      $(".gen-modal").val(data.generic_name);
      $(".cat-modal").val(data.category);
      $(".img-modal").attr("src", data.image);
      
    },
    error: function(error) {
      console.log(error);
    }
  })
}

function editDetails() {
  // enable save and cancel button
  // 

}

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $("#enroll_form").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "enroll.php",
      data: new FormData(this),
      contentType: false,
      processData:false,
      cache: false,
      success: function() {
        $('#enroll_success_text').removeClass('d-none');
        setTimeout(()=> {
          $('#enroll_success_text').addClass('d-none');
        }, 3000)
        $('#barcode').val('');
        $('#description').val('');
        $('#file-label').html("Choose Image");
      },
      error: function(xhr, status, error) {
        console.log(status);
        $('#enroll_error_text').removeClass('d-none');
        setTimeout(()=> {
          $('#enroll_error_text').addClass('d-none');
        }, 3000)
        $('#barcode').val('');
        $('#description').val('');
        // clear category
        $('#imageFile').val('');
        $('#file-label').html("Choose Image");
      }
    });
  });

$(function () {
  $("#example1").DataTable({
    "order": [],
    "columnDefs": [{"className": "dt-center", "targets": "no_sort", "orderable": false}],
    "responsive": true, 
    "lengthChange": true, 
    "autoWidth": false,
    // "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
$(function () {
  bsCustomFileInput.init();
});