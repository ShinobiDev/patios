@extends('layouts.master')

@section('head')
  <link rel="stylesheet" href="{{asset('factura/style.css')}}">

@endsection

@section('content')

  @include('partials.success')

  <header class="clearfix">
      <div id="logo">
        <img src="{{asset('factura/logo.png')}}">
      </div>
      <div id="company">
        <h2 class="name">ITTB-STB</h2>
        <div>Dirección: KR 27 # 27 - 50 </div>
        <div>(Telefono: 312 318 6927 </div>
      </div>
      </div>
    </header>
    <main>
      <h3 style="text-align:center;">Al día de hoy <strong>{{$actuales}}</strong> debe:</h3>
      <div id="details" class="clearfix">
        <div id="client">

          @foreach ($parametros as $parametro)
            @php
              $sistemas = $parametro->sistema_stb + $parametro->sistema_ittb

            @endphp

          @endforeach
            @foreach ($valores as $valor)

              @php
                $dias_cantidad =1+ $actuales->diffInDays($valor->created_at)

              @endphp


          <h2 class="name">{{$valor->nombre}}</h2>
          <div class="address">Identificado: {{$valor->documento}}</div>
          <div class="address">Celular: {{$valor->celular}}</div>
          <div class="address">Direccion: {{$valor->direccion}}</div>
          <div class="email">Email:  {{$valor->mail}}</div>

        </div>
        <div id="invoice">
          <h2 >PLACA <span style="color:red">&nbsp; {{$valor->placa}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
          <div class="date"></div>
          <div class="date"></div>
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
              // $sumi=13017;
            @endphp
              @if ($fechas = $actuales->parse($valor->created_at)->format('Y') != $actual = $actuales->format('Y'))

                @for ($fechas = $actuales->parse($consultas->created_at)->format('Y'); $fechas <= ($actuales->format('Y')); $fechas++)
                  @foreach ($valores as $valor)
                    <form method="POST" action="{{route('invoces.store', $valor)}}">
                      {{csrf_field()}}
                    <input type="hidden" name="entries_id" value="{{$valor->id}}">
                <tr>

                      {{-- @php
                        $paque = App\Rate::find($valor->rate_id);
                      @endphp --}}


                  <td class="no">{{$fechas}}</td>
                  <td class="desc"><h3>Valor Parqueadero</h3>{{$valor->rt_servicio}}</td>



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
                            $valorP = $fact->val_parqueadero;
                            $valorG = $fact->val_grua;

                          }
                    @endphp --}}
                  <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                  <td class="qty">{{$actuales->diffInDays($fechas.'/01/00')}}</td>
                  <td class="total">{{'$  '.number_format(($valor->rt_valor*($actuales->diffInDays($fechas.'/01/00'))),2,',','.')}}</td>
                </tr>
                {{-- <tr>
                  <td class="no">{{$fechas}}</td>
                  <td class="desc"><h3>Valor inmovilizacion grua </h3>Transporte de la direccion del evento al patios donde esta el vehiculo</td>
                  <td class="unit">{{'$  '.number_format($valorG,2,',','.')}}</td>
                  <td class="qty">1</td>
                  <td class="total">{{'$  '.number_format($valorG,2,',','.')}}</td>
                </tr> --}}
                  <tr>


                    <td class="no">{{$fechas}}</td>
                    <td class="desc"><h3>Valor Sistematización</h3></td>
                    <td class="unit">{{'$  '.number_format($sistemas,2,',','.')}}</td>
                    <td class="qty">1</td>
                    <td class="total">{{'$  '.number_format($sistemas,2,',','.')}}</td>

                  </tr>
                  @php
                      $sum += $sistemas+$valor->rt_valor*($actuales->diffInDays($fechas.'/01/00'));
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
                            $valorP = $fact->val_parqueadero;
                            $valorG = $fact->val_grua;

                          }
                    @endphp --}}

                        <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                        <td class="qty">365</td>
                        <td class="total">{{'$  '.number_format(($valor->rt_valor*365),2,',','.')}}</td>
                      </tr>
                      <tr>
                        <td class="no">{{$fechas}}</td>
                        <td class="desc"><h3>Valor inmovilizacion grua </h3> {{$valor->cr_servicio}}</td>
                        <td class="unit">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
                        <td class="qty">1</td>
                        <td class="total">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
                      </tr>
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
                                $valorP = $fact->val_parqueadero;
                                $valorG = $fact->val_grua;

                              }
                        @endphp --}}
                      <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
                      <td class="qty">{{$actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')+1}}</td>
                      <td class="total">{{'$  '.number_format(($valor->rt_valor*($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')+1)),2,',','.')}}</td>
                    </tr>
                            {{-- @php
                              $paque = App\Crane::find($valor->crane_id);
                            @endphp --}}
                              {{-- @foreach ($paque as $paques)
                                {{  $resul1 = $paque->servicio }}
                              @endforeach --}}
                    <tr>
                      <td class="no">{{$fechas}}</td>
                      <td class="desc"><h3>Valor inmovilizacion grua </h3>{{$valor->cr_valor}}</td>
                      <td class="unit">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
                      <td class="qty">1</td>
                      <td class="total">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
                    </tr>

                      @php
                          $sum += $valor->cr_valor+($valor->rt_valor*($actuales->parse($valor->created_at)->diffInDays($fechas.'/12/31')+1));
                      @endphp
                  @endif

                @endforeach
                @endfor

            @else
              @foreach ($valores as $valor)
                <form method="POST" action="{{route('invoces.store', $valor->id)}}">
                  {{csrf_field()}}
                <input type="hidden" name="entries_id" value="{{$valor->id}}">
                <input type="hidden" name="dias_cantidad" value="{{$dias_cantidad}}">
                @php
                    $sum += ($sistemas+$valor->cr_valor+$valor->rt_valor)+($valor->rt_valor*($actuales->diffInDays($valor->created_at)))
                @endphp

                {{-- @php
                  $paque = App\Rate::find($valor->rate_id);
                @endphp


                  @php
                    $paque1 = App\Crane::find($valor->crane_id);
                  @endphp --}}

              <td class="no">{{$valor->rt_anio}}</td>
              <td class="desc"><h3>Valor Parqueadero</h3>{{$valor->rt_servicio}}</td>
              <td class="unit">{{'$  '.number_format($valor->rt_valor,2,',','.')}}</td>
              <td class="qty">{{1+$actuales->diffInDays($valor->created_at)}}</td>
              <td class="total">{{'$  '.number_format(($valor->rt_valor+$valor->rt_valor*($actuales->diffInDays($valor->created_at))),2,',','.')}}</td>

            </tr>
            <tr>
              <td class="no">{{$valor->cr_anio}}</td>
              <td class="desc"><h3>Valor inmovilizacion grua </h3>{{$valor->cr_servicio}}</td>
              <td class="unit">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
              <td class="qty">1</td>
              <td class="total">{{'$  '.number_format($valor->cr_valor,2,',','.')}}</td>
            </tr>
            <tr>
              <td class="no">{{$valor->anio}}</td>
              <td class="desc"><h3>Valor Sistematización</h3></td>
              <td class="unit">{{'$  '.number_format($sistemas,2,',','.')}}</td>
              <td class="qty">1</td>
              <td class="total">{{'$  '.number_format($sistemas,2,',','.')}}</td>
            </tr>



            @endforeach
            @endif

          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SUBTOTAL</td>
              <td>{{'$  '.number_format($sum, 2,',','.')}}</td>
              @php
                $stb = ($sum-$sistemas)*70/100;
                $ittb = ($sum-$sistemas)*30/100;

              @endphp
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
              <input type="hidden" name="elaborado" value="{{ Auth::user()->email }}">
              <input type="hidden" name="valor_stb" value="{{$stb}}">
              <input type="hidden" name="valor_ittb" value="{{$ittb}}">
            </tr>


          </tfoot>
          <br>



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
          <tr class="">
            <td colspan="2">

            @if ($totalr <=0)

                <button type="submit" class="btn btn-success btn-lg " name="">Generar Recibo</button>
            @else

              <a href="{{route('invoces.valor',$valor)}}" class="btn btn-primary btn-lg " name="">Añadir Ingreso</a>
            @endif


              {{-- <button type="submit" class="btn btn-success btn-lg " name="">Generar Factura</button> --}}
            </td>
          </tr>
        </tbody>
      </table>
      </form>
        @endforeach
      <div id="thanks">Gracias! recuerde retirar el vehículo el mismo día del pago </div>
      <div id="notices">
        <div>
          <h4>Recuerde retirar el vehículo el mismo día del pago. Para evitar costos adicionales</h4>
          <p>Para obtener más información comuníquese con nosotros o acérquese al patio donde se encuentra su vehículo.</p>
          </div>
        <div class="notice">Texto Adicional.</div>
      </div>
    </main>
    <footer>
      La factura se creó en una computadora y no es válida sin la firma y el sello.
    </footer>

@endsection
