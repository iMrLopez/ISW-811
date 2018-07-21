swal({
  type: '{{session()->get('msg.type')}}',
  title: '{{session()->get('msg.title')}}',
  text: '{{session()->get('msg.contents')}}',
  footer: '<b>Marny A. Lopez Lopez - 1 1623 0677</b>'
})
