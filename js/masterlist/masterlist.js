function viewModal(el) {
    $.ajax({
      type: "GET",
      url: "get_masterlist.php",
      data: {"barcode": String(el.getAttribute("data-id"))},
      dataType: "JSON",
      success: function(data) {
        if (el.getAttribute("data-option") == "view") {
          $("#barcode-view").val(data.barcode);
          $("#desc-view").val(data.description);
          $("#img-view").attr("src", data.image);
        } else if (el.getAttribute("data-option") == "update") {
          $("#barcode-update").val(data.barcode);
          $("#desc-update").val(data.description);
          $("#img-update").attr("src", data.image);
        }
      },
      error: function(error) {
        console.log(error);
      }
    })
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
      success: function(data) {
        console.log(data);
        $('#enroll_success_text').removeClass('d-none');
        setTimeout(()=> {
          $('#enroll_success_text').addClass('d-none');
        }, 3000)
        $('#barcode').val('');
        $('#description').val('');
        $('#imageFile').val('');
        var fileName = $('.custom-file-input').val().split("\\").pop();
        $('.custom-file-input').siblings(".custom-file-label").addClass("selected").html(fileName);
      },
      error: function(xhr, status, error) {
        console.log(status);
        $('#enroll_error_text').removeClass('d-none');
        setTimeout(()=> {
          $('#enroll_error_text').addClass('d-none');
        }, 3000)
        $('#barcode').val('');
        $('#description').val('');
        $('#imageFile').val('');
        var fileName = $('.custom-file-input').val().split("\\").pop();
        $('.custom-file-input').siblings(".custom-file-label").addClass("selected").html(fileName);
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
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
$(function () {
  bsCustomFileInput.init();
});