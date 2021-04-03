$(document).on('click','#reject', function () {
  var id = $(this).attr('data-id-reject');
  $.get('/pemilik/reject-payment', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
    window.location.href = "{{ route('booking-lists')}}";
  });
});