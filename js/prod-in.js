// GET request to check barcode if exist in db
$("#barcode").on("change", ()=>{
    // $("#receive-prod-form").on("submit", (e)=>{
    //     e.preventDefault();
    // });
    $.ajax({
        type: "GET",
        url: "prod-in-functions.php",
        data: {"barcode": $("#barcode").val(), action: "get_product"},
        dataType: "JSON",
        success: function(data) {
            if ( data == "Not found" ) {
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
          console.log(status, error);
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
                                <td>${data.expiration}</td>
                            </tr>`
            tbody.appendChild(tr);

            let fields = this.querySelectorAll("input");

            fields.forEach(field => {
                if (field.name != "entry_date" || field.name != "receive_prod") {
                    field.value = '';
                }
            });

        },
        error: function(error, status, xhr) {
            console.error(error, status, xhr);
        }
      });
});

$(function() {
    $("#example1").DataTable({
    "columnDefs": [{
        "className": "dt-center",
        "targets": "_all"
    }],
    "responsive": true,
    "lengthChange": true,
    "scrollY": '500px',
    "scrollCollapse": true,
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