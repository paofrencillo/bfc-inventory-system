$(document).ready(function() {
  $('.selectpicker1').selectpicker();
  $('.selectpicker2').selectpicker();
  $('.selectpicker3').selectpicker();
  $('.selectpicker4').selectpicker();
  document.getElementsByClassName("dropdown-toggle")[2].setAttribute("disabled", true);
  document.getElementsByClassName("dropdown-toggle")[3].setAttribute("disabled", true);
});

// View product details
function viewModal1(el) {
  $.ajax({
    type: "GET",
    url: "masterlist-functions.php",
    data: {"barcode": el.getAttribute("data-id"), action: "get_product"},
    dataType: "JSON",
    success: function(data) {
      $("#barcode-modal-details").val(data.barcode);
      $("#desc-modal-details").val(data.description);
      $("#gen-modal-details").val(data.generic_name);
      $("#cat-modal-details").val(data.category);
      $("#supp-modal-details").val(data.supplier);
      $("#edited-modal-details").val(data.last_edited);
      $("#img-modal-details").attr("src", data.image);
    },
    error: function(error) {
      console.log(error);
    }
  })
}

// View product details
function viewModal2(el) {
  $.ajax({
    type: "GET",
    url: "masterlist-functions.php",
    data: {"barcode": el.getAttribute("data-id"), action: "get_product"},
    dataType: "JSON",
    success: function(data) {
      $("#barcode-modal").val(data.barcode);
      $("#desc-modal").val(data.description);
      $("#gen-modal").val(data.generic_name);
      $("#cat-modal").selectpicker('val', data.category);
      $("#supp-modal").selectpicker('val', data.supplier);
      $("#img-modal").attr("src", data.image);
    },
    error: function(error) {
      console.log(error);
    }
  })
}

// Edit product details
function editDetails(el) {
  // enable save and cancel button
  $("#save-cancel-btns").removeClass("d-none");
  $(el).addClass("d-none");

  modal_fields = document.getElementById("edit").querySelectorAll("input");
  document.getElementsByClassName("dropdown-toggle")[2].removeAttribute("disabled");
  document.getElementsByClassName("dropdown-toggle")[3].removeAttribute("disabled");

  modal_fields.forEach(field => {

    if (field.id != "barcode-modal") {
        field.removeAttribute("readonly");
      if (field.id == "imageFile2") {
        $("#img-update-field").removeClass("d-none");
      }
    }
  });
}

// Remove input attributes
function removeAttrInputs() {
  $("#description").removeAttr("disabled");
  $("#generic_name").removeAttr("disabled");
  $("#category").removeAttr("disabled");
  document.getElementsByClassName("dropdown-toggle")[0].removeAttribute("disabled");
  document.getElementsByClassName("dropdown-toggle")[1].removeAttribute("disabled");
  $("#imageFile").removeAttr("disabled");

  $("#description").val('');
  $("#generic_name").val('');
  $("#category").val('');
  $("#supp").val('');
  $("#file-label").html("Choose Image");
  $("#imageFile").val("");
}

// ------ Delete product
function deleteProduct() {
  let barcode =  $("#delete-product-btn").attr("data-product-barcode");
  let formData = new FormData();
  formData.append('action', 'delete');
  formData.append('barcode', barcode);
  
  $.ajax({
    type: "POST",
    url: "masterlist-functions.php",
    data: formData,
    contentType: false,
    processData:false,
    cache: false,
    success: function() {
      location.reload();     
    },
    error: function(error, status) {
      console.error(error, status);
    }
  });
}

// ------ Cancel product update
$('#edit').on('hidden.bs.modal', function (e) {
  $("#save-cancel-btns").addClass("d-none");
  $("#update-btn").removeClass("d-none");

  document.getElementsByClassName("dropdown-toggle")[2].setAttribute("disabled", true);
  document.getElementsByClassName("dropdown-toggle")[3].setAttribute("disabled", true);

  modal_fields = document.getElementById("edit").querySelectorAll("input");
  modal_fields.forEach(field => {
    if (field.id != "barcode-modal") {
      field.setAttribute("readonly", "");

      if (field.id == "imageFile2") {
        $("#img-update-field").addClass("d-none")
      }    
    } 
  });
})

// Cancel product enroll 
$("#addnew").on('hidden.bs.modal', function(e) {
  $("#barcode").val('');
  $("#enroll_warning_text").addClass("d-none");
  $("#enroll-btn").removeAttr("disabled");
  removeAttrInputs();
});

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

// ------ Check if product is already enrolled
$("#barcode").on("change", ()=> {
  $("enroll_form").on("submit", (e)=> {
    e.preventDefault();
  });
  $.ajax({
    type: "GET",
    url: "masterlist-functions.php",
    data: {"barcode": $("#barcode").val(), action: "get_product"},
    dataType: "JSON",
    success: function(data) {
      if (data != "Not found") {
        $("#description").attr("disabled", "");
        $("#generic_name").attr("disabled", "");
        document.getElementsByClassName("dropdown-toggle")[0].setAttribute("disabled", true);
        document.getElementsByClassName("dropdown-toggle")[1].setAttribute("disabled", true);
        $("#imageFile").attr("disabled", "");
  
        $("#barcode").val(data.barcode);
        $("#description").val(data.description);
        $("#generic_name").val(data.generic_name);
        $("#category").selectpicker('val', data.category);
        $('#supp').selectpicker('val', data.supplier);
        let imgName = data.image;
        let strip_imgName = imgName.replace("product-imgs/", '')
        $("#file-label").html(strip_imgName);
        $("#enroll_warning_text").removeClass("d-none");
        $("#enroll-btn").attr("disabled", "");
      }
      else {
        $("#enroll_warning_text").addClass("d-none");
        $("#enroll-btn").removeAttr("disabled");
        document.getElementById("description").focus();
        removeAttrInputs();
      }
    },
    error: function(error) {
      console.error(error);
    }
  })
});

// ------ Enrolling new product
$("#enroll_form").on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "masterlist-functions.php",
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
      $("#category").val('');
      $("#supp").val('');
      $('#imageFile').val('');
      $('#file-label').html("Choose Image");
    }
  });
});

// ------------ Updating Product
$("#update_masterlist_form").on("submit", function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "masterlist-functions.php",
    data: new FormData(this),
    contentType: false,
    processData:false,
    cache: false,
    success: function() {
      $('#update_success_text').removeClass('d-none');
      setInterval(()=> {
        location.reload();
      }, 750)       
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
