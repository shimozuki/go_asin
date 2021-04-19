
$('#datepicker').datepicker({
  clearBtn: true,
  changeYear: true,
  changeMonth: true,
  autoclose: true,
  todayHighlight: true,
  format: 'mm/dd/yyyy',
  startDate: new Date(),
  endDate: new Date(new Date().setDate(new Date().getDate() + 60))
});

// Total harga kamar + lama sewa

$(function() {
  $(".DropChange").change(function(){
    var valone = $('#hargakamar').val();
    var valtwo = $('#lamasewa').val();
    var perkalian =  valone  * valtwo;
    var totalharga = 'Rp ' + perkalian.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#sewakamar').text(totalharga);
  });
});

// Total harga sewa kamar keseluruhan
$(function() {
  $(".DropChange").change(function(){
    var valone = $('#hargakamar').val();
    var valtwo = $('#lamasewa').val();
    var valThree = $('#depost').val();
    var valFour = $('#biayadmin').val();
    var perkalian =  valone  * valtwo;
    var jumlah = parseInt(perkalian) + parseInt(valThree) + parseInt(valFour);
    var totalharga = 'Rp ' + jumlah.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#hargatotal').text(totalharga);
  });
});

// Tampil tombol and jumlah harga
document.getElementById('lamasewa').addEventListener('change', function () {
  var style = this.value == 1 ? 'block' : this.value == 3 ? 'block' : this.value == 6 ? 'block' : this.value == 12 ? 'block' : 'none';

  document.getElementById('tampil').style.display = style;
});
