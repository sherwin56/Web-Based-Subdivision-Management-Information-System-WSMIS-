// =============  Data Table - (Start) ================= //

$(document).ready(function(){
    
    var table = $('#table').DataTable({
        
        buttons:['print']
        
    });
    
    
    table.buttons().container()
    .appendTo('#table_wrapper .col-md-6:eq(0)');

});

// =============  Data Table - (End) ================= //
