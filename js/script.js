document.addEventListener('DOMContentLoaded', init);
function init(){


// capturo los valores de los atributos en la butaca seleccionada, y se los pongo en el formulario del modal.

  $(".imgFS").click(function(e){
    var actual = e.target;
    var f = actual.getAttribute("data-fila");
    var s = actual.getAttribute("data-silla");

    var fmodal = $("#fmodal");
    var smodal = $("#smodal");
    fmodal.val(f);
    smodal.val(s);

  })


//histograma
  $(".valPeli").click(function(){
    var actual = $(this);
    var histog = actual.children().eq(1);

    if(histog.css("opacity")==0){
      histog.css("opacity","1");
      histog.height(300);
    }else{
      histog.css("opacity","0");
      histog.height(0);

    }

  })
/*
      var imgButaca = document.getElementsByClassName("imgFS");
      imgButaca.addEventListener("click",function(e){
        console.log("hola");
    //      var actual = e.target;

      //    var f = actual.getAttribute('data-fila');
      //    console.log(f);

      })

    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal

    /*  var fila = button.data('fila'); // Extract info from data-* attributes
      var silla = button.data('silla'); // Extract info from data-* attributes

      var modal = $(this);
      modal.find('.f').val(fila);
      modal.find('.s').setAttribute('name', silla);

      console.log($('fila'));
      console.log(silla);

      //var f = button.getAttribute("data-fila");
    //  console.log(f);
      console.log("hola");
    })

  /*
    $('.fotosilla').click(function(){
      console.log("pul");
  */

    //});




}
