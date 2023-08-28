var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardar(e);	
    });
}

function guardar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]); 
    $.ajax({ 
        url: "../../controller/especialidad.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(datos){    
            console.log(datos);
            $("#modalmantenimiento").modal('hide');  
            $('#usuario_data').DataTable().ajax.reload();   
            Swal.fire(
                'Salutech',
                'Completado!',
                'success'
              )
        },
        
    }); 
    
}

$(document).ready(function(){
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        //dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        "ajax":{
            url: '../../controller/especialidad.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});



function eliminar(especialidad_id){
    Swal.fire({
        title: 'Salutech',
        text: "¿Está seguro que desea eliminar esta cita?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/especialidad.php?op=eliminar", {especialidad_id : especialidad_id}, function (data) {
                console.log(data);
            }); 
            $('#usuario_data').DataTable().ajax.reload();
          Swal.fire(
            'Salutech',
            'Especialidad eliminada!',
            'success'
          )
        }
      })
}


$(document).on("click","#btnnuevo", function(){
    //('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();