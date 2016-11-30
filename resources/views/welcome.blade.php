   <!DOCTYPE html>
   <html>
      <head>
         <title>Ratu Ongkir</title>
        <!--  <link href="css.css" rel="stylesheet">  tytytyy -->
         <!--Import Google Icon Font-->
         <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!--Import materialize.css-->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
         <!--Let browser know website is optimized for mobile-->
         <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      </head>
      <body>
 
         <nav>
            <div class="nav-wrapper">
               <div class="nav-wrapper">
                  <center><a href="#!" class="brand-logo">Ratu Ongkir</a></center>
                  
               </div>
         </nav>
         <div class="container">
         <form action="periksaOngkir" method="GET">
         {{ csrf_field() }}
            <div class="row container">
               <div class="input-field col s12">
                  <select id="kotaAsal" name="kotaAsal">
                  <option value=""  selected>Kota asal pengiriman</option>
                  </select>
               </div>
               <div class="input-field col s12">
                  <select id="kotaTujuan" name="kotaTujuan">
                  <option value=""  selected>Kota tujuan pengiriman</option>
                  </select>
               </div>
               <div class="input-field col s12">
                  <input placeholder="Berat Kiriman" name="berat" id="berat" type="text" class="validate">
                  <label for="berat">Berat Kiriman</label>
               </div>
            </div>
            <button class="waves-effect waves-light btn"><i class="material-icons left">language</i>Periksa Ongkir</button>
              </form>
         </div>
         <!--Import jQuery before materialize.js-->
         <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function() {
               console.log('aaaaa');
               $.getJSON("{{ url('/getKota') }}", function(hasil){
                  console.log(hasil.rajaongkir.results);
                  $.each(hasil.rajaongkir.results, function(key, value){
                     console.log("<option value='"+value.city_id+"'>"+value.city_name+"</option>");
                    $("#kotaAsal").append("<option value='"+value.city_id+"'>"+value.city_name+"</option>");
                    $("#kotaTujuan").append("<option value='"+value.city_id+"'>"+value.city_name+"</option>");
                  });
                  $('select').material_select();
               });
             
            });
         </script>
         @yield('footer')
      </body>
   </html>