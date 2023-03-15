
function viewModal(el) {
  $.ajax({
    type: "GET",
    url: "get_masterlist.php",
    data: {"barcode": String(el.getAttribute("data-id"))},
    dataType: "JSON",
    success: function(data) {
      $("#barcode-modal").val(data.barcode);
      $("#desc-modal").val(data.description);
      $("#gen-modal").val(data.generic_name);
      $("#cat-modal").val(data.category);
      $("#img-modal").attr("src", data.image);
      
    },
    error: function(error) {
      console.log(error);
    }
  })
}

function editDetails(el) {
  // enable save and cancel button
  $("#save-cancel-btns").removeClass("d-none");
  $(el).addClass("d-none");

  modal_fields = document.getElementById("details").querySelectorAll("input");
  modal_fields.forEach(field => {
    field.removeAttribute("readonly");

    if (field.id == "barcode-modal" || field.id == "employee-id-modal") {
      field.setAttribute("readonly", "");
    } else if (field.id == "imageFile2") {
      $("#img-update-field").removeClass("d-none")
    }
  });
  // show hidden fields
  
  // remove readonly/disable on modal input fields
  // 

}

function cancelUpdate(el) {
  $("#save-cancel-btns").addClass("d-none");
  $("#update-btn").removeClass("d-none");  
}

$("#imageFile2").on("change", (e)=> {
  console.log(e.target.files[0]);
  let file = e.target.files[0];
  let url = URL.createObjectURL(file);
  $("#img-modal").attr("src", url);
});

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
      setInterval(()=> {
        location.reload();
      }, 1000)       
    },
    error: function(xhr, status, error) {
      console.log(status);
      $('#enroll_error_text').removeClass('d-none');
      setTimeout(()=> {
        $('#enroll_error_text').addClass('d-none');
      }, 5000)
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