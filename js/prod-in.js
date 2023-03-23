// GET request to check barcode if exist in db
$("#barcode").on("change", ()=>{

    console.log($("#barcode").val()); 

    $("#receive-prod-form").on("submit", (e)=>{
        e.preventDefault();
    });
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
            }
          
        console.log(data); 
        },
        error: function(error) {
          console.log(error);
        }
      })
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