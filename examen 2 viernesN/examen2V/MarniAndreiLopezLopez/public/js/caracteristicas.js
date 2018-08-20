// Funcion detalle
$(document).on('click', '.ver-detalle', function() {
$('#ver').modal('show');
$('#identificador').text($(this).data('id'));
$('#nomb').text($(this).data('nombre'));
$('#detalle').text($(this).data('detalle'));
});

// Funcion editar Mostrar
$(document).on('click', '.editC', function() {
  $('#footer_action_button').text(" Actualizar caracteristica");
  $('.actionBtn').addClass('btn-success');
  $('.actionBtn').removeClass('btn-danger');
  $('.actionBtn').addClass('editar');
  $('.form-horizontal').show();
  $('#idC').val($(this).data('id'));
  $('#nomC').val($(this).data('nombre'));
  $('#detC').val($(this).data('detalle'));
  $('#modal-Actualizar').modal('show');
});
// Funcion editar

$('.modal-footer').on('click', '.editar', function() {


if($('#nomC').val().length > 0){
  $.ajax({
    type: 'post',
    url: 'update-caracteristica/',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $("#idC").val(),
      'nombre': $("#nomC").val(),
      'detalle': $('#detC').val(),
    },
    success: function(data) {
      $('.caracteristica' + data.id).replaceWith(" "+
            "<tr class='caracteristica" + data.id + "'>"+
            "<td>" + data.nombre + "</td>"+
            "<td>" + data.created_at + "</td>"+
             "<td>"+
             "<button class='show-modal btn btn btn-outline-info' data-id='" + data.id + "' data-nombre='" + data.nombre + "'>"+
             "<img src='"+imgURL+"/view-2.png' class='ico' alt='Editar' />"+
             "</button>"+
             "<button class='edit-modal btn btn btn-outline-warning' data-id='" + data.id + "' data-nombre='" + data.nombre + "'>"+
             "<img src='"+imgURL+"/edit.png' class='ico' alt='Editar' />"+
             "</button>"+
             "</td></tr>");
    }
  });
}else{
  $('.alert-danger').show();
  $('.alert-danger').append('<p>El Nombre es requerido</p>')
}




});
