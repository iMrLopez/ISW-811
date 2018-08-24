@extends('layouts._app')
@section('title',"Home")
@section('content')
<script src="{{asset('app/js/plugins/qrcode.js')}}" type="text/javascript"></script>
<script src="{{asset('app/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
function PrintElem(elem) //Tnis functions is used to print the coupon for the user
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>Impresion de cupon</title>');
    mywindow.document.write('</head><body>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>


<div class="row">
  @foreach ($data as $actual)
  <div class="col-md-4">
    <div class="card card-user">
      <div class="card-image">
        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&amp;fm=jpg&amp;h=300&amp;q=75&amp;w=400" alt="...">
      </div>
      <div id="toPrint{{$actual->id}}">
        <div class="card-body">
        <div class="author">
          <a href="#">
            <img class="avatar border-gray" src="{{asset('app/img/Coupon.jpg')}}" alt="...">
            <h5 class="title">Cupon numero {{$actual->id}}</h5>
          </a>
        </div>
        <div class="row">
          <div class="col-md-12" style="align-items: center">
            <div id="qrcode{{$actual->id}}"></div>
            <script type="text/javascript">
            new QRCode(document.getElementById("qrcode{{$actual->id}}"), "{'client':'{{$actual->walletId}}','couponId':{'id':'{{$actual->id}}','description':'{{$actual->transactionDescription}}'}}");
            $("#qrcode{{$actual->id}} > img").css({"margin":"auto"});
            </script>
          </div>
        </div>
      </div>
        <div class="description text-center">
        <br><b>Descripcion del cupon:</b> {{$actual->transactionDescription}}
        <br><b>Creado el:</b> {{$actual->created_at}}
        <br>&nbsp;
      </div>
      </div>
      <hr>
      <div class="button-container mr-auto ml-auto">
        <button onclick="PrintElem('toPrint{{$actual->id}}')" class="btn btn-warning">Imprimir este cupon</button>
      </div>
    </div>
  </div>
    @endforeach
</div>


@endsection()
