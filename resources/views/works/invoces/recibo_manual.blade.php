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
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
          }
          table th {
            white-space: nowrap;
            font-weight: normal;
          }
          table td {
            text-align: right;
          }
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

          <h2 class="name">{{$nombre}}</h2>
          <div class="address">Identificado: {{$documento}}</div>
          <div class="address">Celular: {{$celular}}</div>
          <div class="address">Direccion: {{$direccion}}</div>
          <div class="address">Email: {{$mail}}</div>
        </div>
        <div id="invoice">
          <h2 >PLACA <span style="color:red">&nbsp; {{$placa}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1
          @foreach ($invoces as $invoce)
            <strong style="color:blue; font-size:15px;">RECIBO Nº.{{$invoce->id}}</strong>
            <div class="date">Fecha Recibo: {{$invoce->created_at}}:</div>
            <div class="date">Fecha de vencimiento{{$invoce->created_at}}</div>
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
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Este valor es pagado por: </h3>{{$concepto}}</td>
            <td class="unit">0</td>
            <td class="qty">1</td>
            <td class="total">{{'$  '.number_format($valor_factura,2,',','.')}}</td>
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{'$  '.number_format($valor_factura,2,',','.')}}</td>
          </tr>

          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{'$  '.number_format($valor_factura,2,',','.')}}<td>
          </tr>
        </tfoot>
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
