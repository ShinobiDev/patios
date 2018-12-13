<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PatiosApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
           /* .clearfix:after {
            content: "";
            display: table;
            clear: both;
          } */

          body {
            margin:10px;
            width: 350px;
            font-size: 20px;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-family: SourceSansPro;
            text-align: center;
          }
          header {
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
          }
          #logo {
            float: left;
            margin-top: 8px;
          }
          #logo img {
            width: 320px;
            height: 70px;
          }

      </style>
  </head>
  <body class="text-center">
    <header class="clearfix">
      <div class="container">
        <div id="logo" class="text-center">
            <img src="factura/logo.png">

        <div id="company text-center">
          <h2 class="name">ITTB-STB</h2>
          <div>Dirección: KR 27 # 27 - 50 </div>
          <div>Teléfono: 312 318 6927 </div>
        </div>
          </div>
      </div>


      </header>
      <main>
        <div id="details" class="clearfix">
          <div id="client text-center">

          @foreach ($valores as $valor)


                <p>
                     El vehículo de placas <span style="color:blue"><strong>{{$valor->placa}}</strong></span> se encuentra inmovilizado desde {{$valor->created_at}}
                </p>
          @endforeach

            @foreach ($consulta as $consultas)



              <div class="to">PROPIETARIO O INFRACTOR</div>
              <h2 class="name">{{$consultas->nombre}}</h2>
              {{-- <div class="address">Identificado: {{$consultas->documento}}</div> --}}
              <div class="address">Celular: {{$consultas->celular}}</div>
              <div class="address">Direccion: {{$consultas->direccion}}</div>
              <div class="email">Email:  {{$consultas->mail}}</div>

          </div>

        </div>



                @php
                  $sum =0;
                  $sumi=13017;
                @endphp
                  @if ($fechas = $actuales->parse($consultas->created_at)->format('Y') != $actual = $actuales->format('Y'))

                    @for ($fechas = $actuales->parse($consultas->created_at)->format('Y'); $fechas <= ($actuales->format('Y')); $fechas++)
                      @foreach ($valores as $valor)

                        {{-- @php
                          $paque = App\Rate::find($valor->rate_id);
                        @endphp --}}




                    @if ($actuales->format('Y') == $fechas)
                        {{-- @php
                        $facturado = App\Servicio::select('val_grua','val_parqueadero')
                                           ->join('entries','servicios.crane_id','entries.crane_id')
                                           ->where('entries.id',$valor->id)
                                           ->where('servicios.crane_id','=',$valor->crane_id)
                                           ->where('servicios.rate_id','=',$valor->rate_id)
                                           ->where('servicios.anio',$fechas)
                                           ->get();
                              foreach ($facturado as $fact) {
                                $valor->rt_valor = $fact->val_parqueadero;
                                $valor->cr_valor = $fact->val_grua;

                              }
                        @endphp --}}

                      @php
                          $sum += $sumi+$valor->rt_valor*($actuales->diffInDays($fechas.'/01/00'));
                      @endphp
                    @elseif ($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')>'365')
                        {{-- @php
                        $facturado = App\Servicio::select('val_grua','val_parqueadero')
                                           ->join('entries','servicios.crane_id','entries.crane_id')
                                           ->where('entries.id',$valor->id)
                                           ->where('servicios.crane_id','=',$valor->crane_id)
                                           ->where('servicios.rate_id','=',$valor->rate_id)
                                           ->where('servicios.anio',$fechas)
                                           ->get();
                              foreach ($facturado as $fact) {
                                $valor->rt_valor = $fact->val_parqueadero;
                                $valor->cr_valor = $fact->val_grua;

                              }
                        @endphp --}}


                            @php
                                $sum += $valor->rt_valor*(365);
                            @endphp
                          @else
                            {{-- @php
                            $facturado = App\Servicio::select('val_grua','val_parqueadero')
                                               ->join('entries','servicios.crane_id','entries.crane_id')
                                               ->where('entries.id',$valor->id)
                                               ->where('servicios.crane_id','=',$valor->crane_id)
                                               ->where('servicios.rate_id','=',$valor->rate_id)
                                               ->where('servicios.anio',$fechas)
                                               ->get();
                                  foreach ($facturado as $fact) {
                                    $valor->rt_valor = $fact->val_parqueadero;
                                    $valor->cr_valor = $fact->val_grua;

                                  }
                            @endphp


                          @php
                            $paque1 = App\Crane::find($valor->crane_id);
                          @endphp --}}


                          @php
                              $sum += $valor->cr_valor+($valor->rt_valor*($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')+1));
                          @endphp
                      @endif

                      {{-- <td class="total">{{'$  '.number_format(($valor->val_parqueadero+$valor->val_parqueadero*($actuales->diffInDays($valor->created_at))),2,',','.')}}</td> --}}



                    @endforeach
                    @endfor

                @else
                  @foreach ($valores as $valor)
                    @php
                        $sum += ($sumi+$valor->cr_valor+$valor->rt_valor)+($valor->rt_valor*($actuales->diffInDays($valor->created_at)))
                    @endphp

                  {{-- @php
                    $paque = App\Rate::find($valor->rate_id);
                  @endphp
                  @php
                    $paque1 = App\Crane::find($valor->crane_id);
                  @endphp --}}

                @endforeach
                @endif

                @php
                  $stb = ($sum-$sumi)*70/100;
                  $ittb = ($sum-$sumi)*30/100;
                @endphp
                <br>
                  <p>Al día de hoy <br><strong>{{$actuales}}</strong> <br>debe un:</p>
                    <h2 class="text-red">GRAN TOTAL</h2>
              <h1 class="text-red">{{'$  '.number_format($sum, 2,',','.')}}</h1>


              @endforeach



        {{-- <br><a  class="btn btn-success btn-block" href="{{route('login')}}"><strong>Salir</strong></a> <br><br><br> --}}
        <div class="text-center bg-black">
          <p style="text-align:justify; margin:7px;">
            Recuerde retirar el vehículo el mismo día del pago. Para evitar costos adicionales
          </p>
          <hr>
            <p style="text-align:justify; margin:7px;">Para obtener más información comuníquese con nosotros o acérquese al patio donde se encuentra su vehículo.</p>



        <footer>
          <hr>
        <p style="text-align:justify; margin:7px;">
          El Recibo se creó en una computadora y no es válida sin la firma y el sello de PAGADO.
        </p>
      </footer>
      </div>
      </main>

      <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
