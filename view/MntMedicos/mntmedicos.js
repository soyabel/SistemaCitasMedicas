var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]); 
    $.ajax({ 
        url: "../../controller/medico.php?op=guardaryeditar",
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
              );
        }
    }); 
}

$(document).ready(function(){
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'               
                ],
        "ajax":{
            url: '../../controller/medico.php?op=listar',
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

function editar(medico_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/medico.php?op=mostrar", {medico_id : medico_id}, function (data) {
        data = JSON.parse(data);//el data contiene el json en formato texto y con el JSON.parse lo transformamos a un json
        $('#medico_id').val(data.medico_id);
        $('#nombre').val(data.nombre);
        $('#apellido').val(data.apellido);
        $('#especialidad').val(data.especialidad);
        
    }); 

    $('#modalmantenimiento').modal('show');
}



function eliminar(medico_id){
    Swal.fire({
        title: 'Salutech',
        text: "¿Está seguro que deseas eliminar a este médico?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/medico.php?op=eliminar", {medico_id : medico_id}, function (data) {
                console.log(medico_id);
            }); 
            $('#usuario_data').DataTable().ajax.reload();
          Swal.fire(
            'Salutech',
            'Medico eliminado!',
            'success'
          );
        }
      })
}


$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();
