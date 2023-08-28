var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardar(e);	
    });

    $("#editar_form").on("submit",function(e){
        console.log("entra en editar");
        actualizar(e);
    });
}

function guardar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]); 
    $.ajax({ 
        url: "../../controller/cita.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset(); 
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

function actualizar(e){
    e.preventDefault();
	var formData = new FormData($("#editar_form")[0]); 
    $.ajax({ 
        url: "../../controller/cita.php?op=editar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset(); 
            $("#modalmantenimientoeditar").modal('hide');  
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
    console.log("HOLAAAAAAAAAAAA")
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
        // buttons: [		          
        //         'copyHtml5',
        //         'excelHtml5',
        //         'csvHtml5',
        //         'pdfHtml5'
        //         ],
        "ajax":{
            url: '../../controller/cita.php?op=listar',
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



function eliminar(cita_id){
    Swal.fire({
        title: 'Salutech',
        text: "¿Está seguro que desea eliminar esta cita?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminalo!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/cita.php?op=eliminar", {cita_id : cita_id}, function (data) {
                console.log(data);
            }); 
            $('#usuario_data').DataTable().ajax.reload();
          Swal.fire(
            'Salutech!',
            'Cita eliminada!',
            'success'
          )
        }
      })
}

function editar(cita_id){
    $.post("../../controller/cita.php?op=mostrar", {cita_id : cita_id}, function (data) {
        data = JSON.parse(data);
        $('#cita_id').val(data.cita_id);
        $('#especialidad').val(data.especialidad);
        $('#fechacita').val(data.fechacita);
        $('#estadocita').val(data.estadocita);
    });
    $('#modalmantenimientoeditar').modal('show');
}

$(document).on("click","#btnnuevo", function(){
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();