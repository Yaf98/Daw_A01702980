$(document).ready(function(){
  //alert("JQUERY IS BEING USED");
  $('#b1').on('click',function(){
      let flag = 1;
      $.ajax({
          type: 'POST',
          url: 'obtener_proveedores.php',
          data:{flag:flag}
      })
      .done(function(data){
          $('#b1').hide();
          $('#proveedores').html(data);       
      })
      .fail(function(){
          console.log('error');
      })
  });


  $('#b2').on('click',function(){

      let precio =  prompt("Introduce el precio: ");
      //console.log($precio);
      let flag = 1;
      $.ajax({
          type: 'POST',
          url: 'obtener_materiales_precio.php',
          data:{precio:precio}
      })
      .done(function(data){
          $('#b2').hide();
          $('#precio').html(data);       
      })
      .fail(function(){
          console.log('error');
      })
  });

  $('#b3').on('click',function(){

      let cantidad =  prompt("Introduce el precio: ");
      console.log(cantidad);
      let flag = 1;
      $.ajax({
          type: 'POST',
          url: 'obtener_materiales_cantidad.php',
          data:{cantidad:cantidad}
      })
      .done(function(data){
          $('#b3').hide();
          $('#cantidad').html(data);       
      })
      .fail(function(){
          console.log('error');
      })
  });

});
