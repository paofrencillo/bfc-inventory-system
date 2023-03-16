// //-------------- AUTOMATIC RELOAD TABLE (TRY LANGZZZ)
// document.addEventListener('DOMContentLoaded', function () {
//   $.ajax({
//     type: "GET",
//     url: "get_masterlist.php",
//     data: {get_products: "get_products"},
//     dataType: "html",
//     success: function(data) {
   
//     },
//     error: function(error) {
//       console.error(error);
//     }
//   })
// }, false);

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
      $("#delete-product-btn").attr("data-product-barcode", data.barcode);   
    },
    error: function(error) {
      console.error(error);
    }
  })
}

function editDetails(el) {
  // enable save and cancel button
  $("#save-cancel-btns").removeClass("d-none");
  $(el).addClass("d-none");

  modal_fields = document.getElementById("details").querySelectorAll("input");
  $("#cat-modal").removeAttr("disabled")
  modal_fields.forEach(field => {

    if (field.id != "barcode-modal") {
        field.removeAttribute("readonly");
         
    } else if (field.id == "imageFile2") {
      $("#img-update-field").removeClass("d-none")
    }
  });
}

// ------ Cancel product update
function cancelUpdate(el) {
  $("#save-cancel-btns").addClass("d-none");
  $("#update-btn").removeClass("d-none");

  $("#cat-modal").attr("disabled", "")
  modal_fields = document.getElementById("details").querySelectorAll("input");
  modal_fields.forEach(field => {

    if (field.id != "barcode-modal") {
        field.setAttribute("readonly", "");
         
    } else if (field.id == "imageFile2") {
      $("#img-update-field").addClass("d-none")
    }
  });
}

// ------ Delete product
function deleteProduct() {
  let barcode =  $("#delete-product-btn").attr("data-product-barcode");
  $.ajax({
    type: "POST",
    url: "post_masterlist.php",
    data: {action: 'delete', barcode: barcode},
    cache: false,
    success: function(data) {
      location.reload();     
    },
    error: function(error) {
      console.error(error);
    }
  
  })
  ;
}

// ------ Close Delete Modal
$(".close-modal-delete1").on("click", ()=> {
  $("#delete-modal").modal("hide");
});

$(".close-modal-delete2").on("click", ()=> {
  $("#delete-modal").modal("hide");
});

// ------ Updating product image
$("#imageFile2").on("change", (e)=> {
  let file = e.target.files[0];
  let url = URL.createObjectURL(file);
  $("#img-modal").attr("src", url);
});

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

// ------ Enrolling new product
$("#enroll_form").on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "post_masterlist.php",
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
    error: function(error) {
      console.error(error);
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


$("#update_masterlist_form").on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "post_masterlist.php",
    data: new FormData(this),
    contentType: false,
    processData:false,
    cache: false,
    success: function() {
      $('#update_success_text').removeClass('d-none');
      setInterval(()=> {
        location.reload();
      }, 1000)       
    },
    error: function(error) {
      console.error(error);
      $('#update_error_text').removeClass('d-none');
      setTimeout(()=> {
        $('#update_error_text').addClass('d-none');
      }, 5000)
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