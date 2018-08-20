// Funcion crear mostrar
$(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.alert-danger').empty();
    	$('.alert-danger').hide();
  });
  // Funcion crear
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'store-rasgo/',
      data: {
        '_token': $('input[name=_token]').val(),
        'nombre': $('input[name=nombre]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $.each(data.errors, function(key, value){
                  			$('.alert-danger').show();
                  		$('.alert-danger').append('<p>'+value+'</p>');
                  		});

        }else{
          $('#table').append("<tr class='rasgo" + data.id + "'>"+
          "<td>" + data.nombre + "</td>"+
          "<td>" + data.created_at + "</td>"+
           "<td>"+
           "<button class='show-modal btn btn-info' data-id='" + data.id + "' data-nombre='" + data.nombre + "'><span class='far fa-eye'></span></button>"+
           "<button class='edit-modal btn btn-warning' data-id='" + data.id + "' data-nombre='" + data.nombre + "'><span class='far fa-edit'></span></button>"+
           "</td>"+
           "</tr>");
        }
      },
    });
    $('#nombre').val('');
  });

// Funcion editar Mostrar
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text("Actualizar rasgo");
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.form-horizontal').show();
$('#idC').val($(this).data('data-id'));
$('#nomC').val($(this).data('data-nombre'));
$('#detC').val($(this).data('data-detalle'));
$('#myModal').modal('show');
});
// Funcion editar

$('.modal-footer').on('click', '.edit', function() {
  console.log('asi');
  $.ajax({
    type: 'post',
    url: 'update-rasgo/',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $("#fid").val(),
      'nombre': $('#n').val(),
    },
    success: function(data) {
      $('.rasgo' + data.id).replaceWith(" "+
      "<tr class='rasgo" + data.id + "'>"+
      "<td>" + data.nombre + "</td>"+
      "<td>" + data.created_at + "</td>"+
 "<td>"+
 "<button class='show-modal btn btn btn-outline-info' data-id='" + data.id + "' data-nombre='" + data.nombre + "'>"+
 "<img src='"+imgURL+"/view-2.png' class='ico' alt='Editar' />"+
 "</button>"+
 "<button class='edit-modal btn btn btn-outline-warning' data-id='" + data.id + "' data-nombre='" + data.nombre + "'>"+
 "<img src='"+imgURL+"/edit.png' class='ico' alt='Editar' />"+
 "</button>"+
 "</td>"+
      "</tr>");
    }
  });
});

  // Funcion detalle
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#nom').text($(this).data('nombre'));
  });
