<!DOCTYPE html>
<html lang="es">
  <head>

    <title>RECIBO DE CAJA</title>
    <style>
           .clearfix:after {
            content: "";
            display: table;
            clear: both;
          }
          a {
            color: #0087C3;
            text-decoration: none;
          }
          body {
            font-size: 10px;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-family: SourceSansPro;
          }
          header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
          }
          #logo {
            float: left;
            margin-top: 8px;
          }
          #logo img {
            height: 70px;
          }
          #company {
            /* float: right; */
            text-align: right;
          }
          #details {
            margin-bottom: 50px;
          }
          #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
          }
          #client .to {
            color: #777777;
          }
          h2.name {
            font-weight: normal;
            margin: 0;
          }
          #invoice {
            float: right;
            text-align: right;
          }
          #invoice h1 {
            color: #0087C3;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
          }
          #invoice .date {
            color: #777777;
          }
          table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
          }
          table th,
          table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
          }
          table th {
            white-space: nowrap;
            font-weight: normal;
          }
          /* table td {
            text-align: right;
          } */
          table td h3{
            color: #57B223;
            font-weight: normal;
            margin: 0 0 0.2em 0;
          }
          table .no {
            color: #FFFFFF;
            background: #57B223;
          }
          table .desc {
            text-align: left;
          }
          table .unit {
            background: #DDDDDD;
          }
          table .qty {
          }
          table .total {
            background: #57B223;
            color: #FFFFFF;
          }
          table td.unit,
          table td.qty,
          table td.total {
          }
          table tbody tr:last-child td {
            border: none;
          }
          table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
          }
          table tfoot tr:first-child td {
            border-top: none;
          }
          table tfoot tr:last-child td {
            color: #57B223;
            border-top: 1px solid #57B223;
          }
          table tfoot tr td:first-child {
            border: none;
          }
          #thanks{
            margin-bottom: 50px;
          }
          #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
          }
          #notices .notice {
          }
          footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
          }
      </style>
  </head>
  <body>
    <header class="clearfix">
        <div id="logo">
            <img src="factura/logo.png">
        </div>
        <div id="company">
          <h2 class="name">ITTB-STB</h2>
          <div>Dirección: KR 27 # 27 - 50 </div>
          <div>(Telefono: 312 318 6927 </div>
        </div>

      </header>
      <main>
        <div id="details" class="clearfix">
          <div id="client">

              <div class="address">Fecha Recibo: {{$actuales}}</div>


            @foreach ($consulta as $consultas)

              <div class="to">PAGADO POR:</div>
              <h2 class="name">{{$consultas->nombre}}</h2>
              <div class="address">Identificado: {{$consultas->documento}}</div>
              <div class="address">Celular: {{$consultas->celular}}</div>
              <div class="address">Direccion: {{$consultas->direccion}}</div>
              <div class="email">Email:  {{$consultas->mail}}</div>

          </div>
          <div id="invoice">
            @foreach ($invoces as $invoce)
             <strong style="color:blue; font-size:15px;"><span style="color:red; font-size:15px;">PLACA  {{$numPlaca}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>RECIBO Nº.{{$invoce->id}}</strong>

            @endforeach
          </div>

        </div>
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="no">PERIODO</th>
              <th class="desc">DESCRIPCION</th>
              <th class="unit">VALOR DIARIO</th>
              <th class="qty">DIAS LIQUIDADOS</th>
              <th class="total">TOTAL</th>
            </tr>
          </thead>
          <tbody>


              @php
                $sum =0;
                $sumi=13017;
              @endphp
                @if ($fechas = $actuales->parse($consultas->created_at)->format('Y') != $actual = $actuales->format('Y'))

                  @for ($fechas = $actuales->parse($consultas->created_at)->format('Y'); $fechas <= ($actuales->format('Y')); $fechas++)
                    @foreach ($valores as $valor)

                      @php
                        $paque = App\Rate::find($valor->rate_id);
                      @endphp


                    <td class="no">{{$fechas}}</td>
                    <td class="desc"><h3>Concepto Parqueadero</h3>{{$valor->rt_servicio}}</td>



                  @if ($actuales->format('Y') == $fechas)
                      {{-- @php
                      $facturado = App\Servicio::select('cr_valor','rt_valor')
                                         ->join('entries','servicios.crane_id','entries.crane_id')
                                         ->where('entries.id',$valor->id)
                                         ->where('servicios.crane_id','=',$valor->crane_id)
                                         ->where('servicios.rate_id','=',$valor->rate_id)
                                         ->where('servicios.anio',$fechas)
                                         ->get();
                            foreach ($facturado as $fact) {
                              $valor->rt_valor = $fact->rt_valor;
                              $valor->valor->rt_valor = $fact->cr_valor;

                            }
                      @endphp --}}
                  <tr>
                    <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                    <td class="qty">{{$actuales->diffInDays($fechas.'/01/00')}}</td>
                    <td class="total">{{'$  '.number_format(($valor->rt_valor*($actuales->diffInDays($fechas.'/01/00'))),2,',','.')}}</td>
                  </tr>
                  <tr>
                    <td class="no">{{$fechas}}</td>
                    <td class="desc"><h3>Valor Sistematización</h3></td>
                    <td class="unit">{{'$  '.number_format($sumi,2,',','.')}}</td>
                    <td class="qty">1</td>
                    <td class="total">{{'$  '.number_format($sumi,2,',','.')}}</td>
                  </tr>
                    @php
                        $sum += $sumi+$valor->rt_valor*($actuales->diffInDays($fechas.'/01/00'));
                    @endphp
                  @elseif ($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')>'365')
                      {{-- @php
                      $facturado = App\Servicio::select('cr_valor','rt_valor')
                                         ->join('entries','servicios.crane_id','entries.crane_id')
                                         ->where('entries.id',$valor->id)
                                         ->where('servicios.crane_id','=',$valor->crane_id)
                                         ->where('servicios.rate_id','=',$valor->rate_id)
                                         ->where('servicios.anio',$fechas)
                                         ->get();
                            foreach ($facturado as $fact) {
                              $valor->rt_valor = $fact->rt_valor;
                              $valor->valor->rt_valor = $fact->cr_valor;

                            }
                      @endphp --}}
                        <tr>
                          <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                          <td class="qty">365</td>
                          <td class="total">{{'$  '.number_format(($valor->rt_valor*365),2,',','.')}}</td>
                        </tr>

                          @php
                              $sum += $valor->rt_valor*(365);
                          @endphp
                        @else
                          {{-- @php
                          $facturado = App\Servicio::select('cr_valor','rt_valor')
                                             ->join('entries','servicios.crane_id','entries.crane_id')
                                             ->where('entries.id',$valor->id)
                                             ->where('servicios.crane_id','=',$valor->crane_id)
                                             ->where('servicios.rate_id','=',$valor->rate_id)
                                             ->where('servicios.anio',$fechas)
                                             ->get();
                                foreach ($facturado as $fact) {
                                  $valor->rt_valor = $fact->rt_valor;
                                  $valor->valor->rt_valor = $fact->cr_valor;

                                }
                          @endphp --}}
                      <tr>
                        <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                        <td class="qty">{{$actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')}}</td>
                        <td class="total">{{'$  '.number_format(($valor->rt_valor*($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31'))),2,',','.')}}</td>
                      </tr>
                      <tr>
                        {{-- @php
                          $paque1 = App\Crane::find($valor->crane_id);
                        @endphp --}}

                        <td class="no">{{$fechas}}</td>
                        <td class="desc"><h3>Valor inmovilizacion grua </h3>{{$valor->rt_valor }}</td>
                        <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                        <td class="qty">1</td>
                        <td class="total">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                      </tr>
                        @php
                            $sum += $valor->rt_valor+($valor->rt_valor*($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')+1));
                        @endphp
                    @endif

                    {{-- <td class="total">{{'$  '.number_format(($valor->rt_valor+$valor->rt_valor*($actuales->diffInDays($valor->created_at))),2,',','.')}}</td> --}}



                  @endforeach
                  @endfor

              @else
                @foreach ($valores as $valor)
                  @php
                      $sum += ($sumi+$valor->cr_valor+$valor->rt_valor)+($valor->rt_valor*($actuales->diffInDays($valor->created_at)))
                  @endphp
              <tr>
                {{-- @php
                  $paque = App\Rate::find($valor->rate_id);
                @endphp
                @php
                  $paque1 = App\Crane::find($valor->crane_id);
                @endphp --}}


                <td class="no">{{$valor->rt_anio}}</td>
                <td class="desc"><h3>Concepto Parqueadero</h3>{{$valor->rt_servicio}}</td>
                <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                <td class="qty">{{$actuales->diffInDays($valor->created_at)}}</td>
                <td class="total">{{'$  '.number_format(($valor->rt_valor+$valor->rt_valor*($actuales->diffInDays($valor->created_at))),2,',','.')}}</td>

              </tr>
              <tr>
                <td class="no">{{$valor->rt_anio}}</td>
                <td class="desc"><h3>Concepto inmovilizacion grua </h3>{{$valor->cr_servicio}}</td>
                <td class="unit">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
                <td class="qty">1</td>
                <td class="total">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
              </tr>
              <tr>
                <td class="no">{{$fechas}}</td>
                <td class="desc"><h3>Valor Sistematización</h3></td>
                <td class="unit">{{'$  '.number_format($sumi,2,',','.')}}</td>
                <td class="qty">1</td>
                <td class="total">{{'$  '.number_format($sumi,2,',','.')}}</td>
              </tr>


              @endforeach
              @endif

              @php
                $stb = ($sum-$sumi)*70/100;
                $ittb = ($sum-$sumi)*30/100;
              @endphp
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">SUBTOTAL</td>
                <td>{{'$  '.number_format($sum, 2,',','.')}}</td>
              </tr>
              <tr>
                <td colspan="2">VALOR STB</td>
                <td colspan="2">{{'$  '.number_format($stb+13010, 2,',','.')}}</td>
                <td>$ 0,</td>
              </tr>
              <tr>
                <td colspan="2">VALOR ITTB</td>
                <td colspan="2">{{'$  '.number_format($ittb+7, 2,',','.')}}</td>
                <td>$ 0,</td>

              </tr>
              <tr>
                <td colspan="2"></td>
                <td colspan="2">GRAN TOTAL</td>
                <td>{{'$  '.number_format($sum, 2,',','.')}}</td>
                <input type="hidden" name="valor_factura" value="{{$sum}}">
                <input type="hidden" name="pdf" value="null">
                <input type="hidden" name="estado" value="Generado">
              </tr>

            </tfoot>
            <br>


            @endforeach
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <th>Fecha pago</th>
            <th>Forma de Pago</th>
            <th>Transaccion ID</th>
            <th>Total</th>
          </thead>
          <tbody>
            <tr>
              @php
                $neto = 0;
                $acumulado = 0;
                $totalr =0;
              @endphp
              @foreach ($transaccion as $tran)
                <tr>
                  <td>{{$tran->fecha_transaccion}}</td>
                  <td>{{$tran->forma_de_pago}}</td>
                  <td>{{$tran->id_transaccion}}</td>
                  <td>${{number_format($tran->total,2,',','.')}}</td>

                  @php
                      $acumulado += $tran->total;
                  @endphp
                </tr>

                {{-- <tr>
                  <td colspan="2">Balance </td>
                  <td>{{number_format($neto,2,',','.')}} </td>
                </tr> --}}
              @endforeach
              @php
                $totalr = $sum - $acumulado;
              @endphp
              <tr>

                <td colspan="2" class="total"><strong>Balance</strong></td>
                <td colspan="2" class="total"><strong>${{number_format($totalr,2,',','.')}}</strong></td>
              </tr>
            </tr>

          </tbody>
        </table>
        <div id="thanks">Gracias! recuerde retirar el vehículo el mismo día del pago</div>
        <div id="notices">
          <div>Elaborado por: {{$elaborado}}</div>
          <div class="notice">Caja N.: {{$cajeros}}</div>
        </div>
      </main>
      <footer>
        El Recibo se creó en una computadora y no es válida sin la firma y el sello de PAGADO.
      </footer>
  </body>
</html>
