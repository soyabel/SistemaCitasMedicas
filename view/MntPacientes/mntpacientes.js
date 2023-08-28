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
        url: "../../controller/paciente.php?op=guardar",
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
            url: '../../controller/paciente.php?op=listar',
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



function eliminar(paciente_id){
    Swal.fire({
        title: 'Salutech',
        text: "¿Está seguro que desea eliminar este paciente?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminalo!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/paciente.php?op=eliminar", {paciente_id : paciente_id}, function (data) {
                console.log(data);
            }); 
            $('#usuario_data').DataTable().ajax.reload();
          Swal.fire(
            'Salutech',
            'Paciente eliminado!',
            'success'
          )
        }
      })
}

function editar(paciente_id){
    $.post("../../controller/paciente.php?op=mostrar", {paciente_id : paciente_id}, function (data) {
        data = JSON.parse(data);
        $('#paciente_id').val(data.paciente_id);
        $('#nombre').val(data.nombre);
        $('#apellido').val(data.apellido);
        $('#correo').val(data.correo);
        $('#celular').val(data.celular);
    });
    $('#modalmantenimiento').modal('show');
}

$(document).on("click","#btnnuevo", function(){
    $('#usuario_form')[0].reset();
});

init();