<!DOCTYPE html>
    <html>
      <head>
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
                  <a href="#!" class="brand-logo">Ratu Ongkir</a>
               </div>
            </div>
         </nav>
         <div class="container">
          <table>
            <thead>
              <tr>
                  <th data-field="id">Kurir</th>
                  <th data-field="name">Jenis Layanan</th>
                  <th data-field="price">Tarif</th>
              </tr>
            </thead>
            <tbody id="ongkir">
              
            </tbody>
          </table>
         </div>
         <!--Import jQuery before materialize.js-->
         <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
         <script type="text/javascript">
            var jne = JSON.parse('{!! $jne !!}');
            var pos = JSON.parse('{!! $pos !!}');
            var tiki = JSON.parse('{!! $tiki !!}');
            // console.log(hasil.rajaongkir);
            $.each(jne.rajaongkir.results[0].costs, function(key, value){
              $("#ongkir").append("<tr><td>JNE</td><td>"+value.service+"</td><td>"+value.cost[0].value+"</td></tr>");
              // console.log(value);
            });

            $.each(pos.rajaongkir.results[0].costs, function(key, value){
              $("#ongkir").append("<tr><td>POS</td><td>"+value.service+"</td><td>"+value.cost[0].value+"</td></tr>");
              // console.log(value);
            });

            $.each(tiki.rajaongkir.results[0].costs, function(key, value){
              $("#ongkir").append("<tr><td>TIKI</td><td>"+value.service+"</td><td>"+value.cost[0].value+"</td></tr>");
              // console.log(value);
            });
         </script>
         @yield('footer')
      </body>
   </html>

