// GET request to check barcode if exist in db
$("#barcode").on("change", ()=>{
    $("#receive-prod-form").on("submit", (e)=>{
        e.preventDefault();
    });
    let data = {"barcode": $("#barcode").val(), action: "get_product"};
    $.ajax({
        type: "GET",
        url: "prod-in-functions.php",
        data: data,
        dataType: "JSON",
        success: function(data) {
            if ( data == "Not found" ) {
                let fields = document.getElementById("receive-prod-form").querySelectorAll("input");
            
                fields.forEach(field => {
                    if ( field.name != "action" && field.name != "entry_date" ) {
                        field.value = "";
                    }
                });
                $("#not-enrolled-text").removeClass("d-none");
                setInterval(()=>{
                    $("#not-enrolled-text").addClass("d-none");
                }, 2000); 
            } else {
                $("#description").val(data.description);
                $("#supp").val(data.supplier);
            }    
        },
        error: function(status, error) {
            console.error(status, error);

        }   
    })
});

// Submit receive products
$("#receive-prod-form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "prod-in-functions.php",
        data: new FormData(this),
        contentType: false,
        processData:false,
        cache: false,
        success: function(data) {
            let tbody = document.getElementById("modal-tbody");
            let tr = document.createElement("tr");
            tr.innerHTML = `<tr>
                                <td>${data.barcode}</td>
                                <td>${data.description}</td>
                                <td>${data.quantity}</td>
                                <td>${data.lot}</td>
                                <td>${data.exp}</td>
                            </tr>`
            tbody.appendChild(tr);

            let fields = document.getElementById("receive-prod-form").querySelectorAll("input");

            fields.forEach(field => {
                if (field.name != "entry_date" && field.name != "action") {
                    field.value = '';
                }
            });
        },
        error: function(error, status, xhr) {
            console.error(error, status, xhr);
        }
    });
});

// View product details
function viewModal(el) {
    $.ajax({
        type: "GET",
        url: "prod-in-functions.php",
        data: {"id": el.getAttribute("data-id"), action: "get_product_in"},
        dataType: "JSON",
        success: function(data) {        
            $("#id-details").val(data.id);
            $("#barcode-details").val(data.barcode);
            $("#desc-details").val(data.description);
            $("#quantity-details").val(data.in_quantity);
            $("#lot-details").val(data.lot_no);
            $("#exp-details").val(data.exp_date);
            $("#supp-details").val(data.supplier);
            $("#entry-details").val(data.entry_date);   
        },
        error: function(error) {
            console.log(error);
        }
      })
}

// Edit Product Details
$("#update-btn").on("click", ()=> {
    $("#quantity-details").removeAttr("readonly");
    $("#lot-details").removeAttr("readonly");
    $("#exp-details").removeAttr("readonly");

    $("#update-btn").addClass("d-none");
    $("#save-cancel-btns").removeClass("d-none");
});

// edit product in
$("#update-prod-in-form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "prod-in-functions.php",
        data: new FormData(this),
        contentType: false,
        processData:false,
        cache: false,
        success: function(data) {
            if ( data == "success" ) {
                console.log(data);
                $('#update_success_text').removeClass('d-none');
                setInterval(()=> {
                  location.reload();
                }, 1000)
              } else {
                $('#update_error_text').removeClass('d-none');
                setTimeout(()=> {
                  $('#update_error_text').addClass('d-none');
                }, 5000)
              }
            },
        error: function(error, status, xhr) {
            console.error(error, status, xhr);
            $('#update_error_text').removeClass('d-none');
            setTimeout(()=> {
              $('#update_error_text').addClass('d-none');
            }, 5000)
        }
    });
});

// Cancel product update
$('#details').on('hidden.bs.modal', function () {
    $("#save-cancel-btns").addClass("d-none");
    $("#update-btn").removeClass("d-none");

    $("#quantity-details").attr("readonly", true);
    $("#lot-details").attr("readonly", true);
    $("#exp-details").attr("readonly", true);
})

// Close Delete Modal
$(".close-modal-delete1").on("click", ()=> {
    $("#delete-modal").modal("hide");
});

$(".close-modal-delete2").on("click", ()=> {
    $("#delete-modal").modal("hide");
});

// Delete product
function deleteProduct() {
    let id = $("#id-details").val();
    let formData = new FormData();
    formData.append('action', 'delete');
    formData.append('id', id);

    $.ajax({
      type: "POST",
      url: "prod-in-functions.php",
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

$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
})