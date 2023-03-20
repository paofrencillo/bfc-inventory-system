function viewModal(el) {
  console.log(el.getAttribute("data-id"))
  $.ajax({
    type: "GET",
    url: "get_masterlist.php",
    data: {"barcode": el.getAttribute("data-id"), action: "get_product"},
    dataType: "JSON",
    success: function(data) {
      $("#barcode-modal").val(JSON.parse(data.barcode));
      $("#desc-modal").val(data.description);
      $("#gen-modal").val(data.generic_name);
      $("#cat-modal").val(data.category);
      $("#img-modal").attr("src", data.image);
      $("#delete-product-btn").attr("data-product-barcode", data.barcode);   
    },
    error: function(xhr, error, status, data) {

      console.log(xhr, error, status, data.barcode);
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
      if (field.id == "imageFile2") {
        $("#img-update-field").removeClass("d-none");
      }
    }
  });
}

function removeAttrInputs() {
  $("#description").removeAttr("disabled");
  $("#generic_name").removeAttr("disabled");
  $("#category").removeAttr("disabled");
  $("#imageFile").removeAttr("disabled");

  $("#description").val('');
  $("#generic_name").val('');
  $("#category").val('');
  $("#file-label").html("Choose Image");
  $("#imageFile").val("");
}

// ------ Delete product
function deleteProduct() {
  let barcode =  $("#delete-product-btn").attr("data-product-barcode");
  $.ajax({
    type: "POST",
    url: "post_masterlist.php",
    data: {action: 'delete', barcode: barcode},
    cache: false,
    success: function() {
      location.reload();     
    },
    error: function(error) {
      console.error(error);
    }
  });
}

// ------ Cancel product update
$('#details').on('hidden.bs.modal', function (e) {
  $("#save-cancel-btns").addClass("d-none");
  $("#update-btn").removeClass("d-none");

  $("#cat-modal").attr("disabled", "")
  modal_fields = document.getElementById("details").querySelectorAll("input");
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
  $.ajax({
    type: "GET",
    url: "get_masterlist.php",
    data: {"barcode": $("#barcode").val(), action: "get_product"},
    dataType: "JSON",
    success: function(data) {
      if (data != "Not found") {
        $("#description").attr("disabled", "");
        $("#generic_name").attr("disabled", "");
        $("#category").attr("disabled", "");
        $("#imageFile").attr("disabled", "");
  
        $("#barcode").val(data.barcode);
        $("#description").val(data.description);
        $("#generic_name").val(data.generic_name);
        $("#category").val(data.category);
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

// ------------ Updating Product
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
