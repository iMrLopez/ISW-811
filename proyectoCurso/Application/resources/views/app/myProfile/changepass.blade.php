<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cambiar contraseña de usuario</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'security.doChangePassword','class'=>'form']) !!}
        {!! Form::hidden('id',session()->get('user.instance.id')) !!}
        {!! Form::hidden('accion','Password') !!}
        <div class="form-group">
          <label>Contraseña antigua</label>
          {!! Form::text('oldPass',null,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Contraseña nueva</label>
          {!! Form::text('npass1',null,['class' => 'form-control','required']) !!}
        </div>
        <div class="form-group">
          <label>Confirmacion de contraseña nueva</label>
          {!! Form::text('npass2',null,['class' => 'form-control','required']) !!}
        </div>
        {!! Form::submit('Guardar',['class'=>'btn btn-warning btn-wd']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
