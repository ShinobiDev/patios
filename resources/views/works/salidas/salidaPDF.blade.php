<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.0.4.2 (Linux)"/>
	<meta name="author" content="Administrador"/>
	<meta name="created" content="2011-03-15T15:01:25"/>
	<meta name="changedby" content="Microsoft Office User"/>
	<meta name="changed" content="2018-07-25T06:00:20"/>

	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:10px; }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  }
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  }
		comment { display:none;  }
	</style>

</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="143"></colgroup>
	<colgroup width="20"></colgroup>
	<colgroup width="44"></colgroup>
	<colgroup width="20"></colgroup>
	<colgroup width="71"></colgroup>
	<colgroup span="2" width="94"></colgroup>
	<colgroup span="3" width="20"></colgroup>
	<colgroup width="48"></colgroup>
	<colgroup width="145"></colgroup>
	<colgroup width="94"></colgroup>
	<colgroup span="3" width="20"></colgroup>
	<colgroup width="43"></colgroup>
	<tr>
    @foreach ($salidas  as $salida)


		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=3 height="89" align="center"><font face="Arial" size=3 color="#000000"><br><img src="img/logos.png" width=121 height=86 hspace=11 vspace=2>
		</font></td>
		<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=11 rowspan=3 align="center" valign=middle><b><font face="Arial" size=6 color="#000000">ORDEN DE SALIDA DEL VEHICULO</font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=5 rowspan=2 align="center" valign=middle><b><font face="Arial" size=3 color="#000000">Orden No.</font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=5 align="center" valign=middle><b><font face="Arial" size=3 color="#000000"><br>{{$salida->id}}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=11 rowspan=2 height="37" align="left" valign=middle><b><font size=3 color="#000000">Número de Comparendo: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;       {{$salida->comparendo}}</font></b></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=6 align="center" valign=middle><b><font size=3 color="#000000">Fecha</font></b></td>
		</tr>
	<tr>

		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=4 align="center" valign=middle><font size=3 color="#969696">{{$salida->final}}</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 rowspan=2 height="30" align="left" valign=middle><b><font size=3 color="#000000">Infraccion: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;{{$salida->codigo}} &nbsp; &nbsp;&nbsp; &nbsp;Fecha de Inmovilizacion: &nbsp; &nbsp; {{$salida->inicial}}</font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		@if ($salida->tipo_propi=='Infractor')
			<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000" height="21" align="left"><b><font size=3 color="#000000">Quien retira:</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" bgcolor="#969696"><b><font size=3 color="#000000">INFRACTOR </font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><font size=3 color="#000000">X</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" bgcolor="#969696"><b><font size=3 color="#000000">PROPIETARIO</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><font size=3 color="#000000"></font></td>
		@else
			<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000" height="21" align="left"><b><font size=3 color="#000000">Quien retira:</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" bgcolor="#969696"><b><font size=3 color="#000000">INFRACTOR </font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><font size=3 color="#000000"></font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" bgcolor="#969696"><b><font size=3 color="#000000">PROPIETARIO</font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><font size=3 color="#000000">X</font></td>
		@endif

	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 height="21" align="left" valign=top><b><font size=3 color="#000000">Nombre del infractor o propietario: {{$salida->nombre}}</font></b></td>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 height="21" align="left" valign=top><b><font size=3 color="#000000">Identificación del infractor o propietario:  {{$salida->documento}}</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="16" align="center" bgcolor="#969696"><b><font size=3 color="#000000">PLACA</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" bgcolor="#969696"><b><font size=3 color="#000000">MARCA</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" bgcolor="#969696"><b><font size=3 color="#000000">TIPO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" bgcolor="#969696"><b><font size=3 color="#000000">MODELO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=6 align="center" bgcolor="#969696"><b><font size=3 color="#000000">CLASE</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left"><font size=3 color="#000000"><br>{{$salida->placa}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left"><font size=3 color="#000000"><br>{{$salida->marca}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left"><font size=3 color="#000000"><br>{{$salida->tipo}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="left"><font size=3 color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=6 align="center"><font size=3 color="#000000"><br>{{$salida->servicio}}</font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 height="17" align="center" bgcolor="#969696"><b><font size=3 color="#000000">CILINDRAJE</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="center" bgcolor="#969696"><b><font size=3 color="#000000">COLOR</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center" bgcolor="#969696"><b><font size=3 color="#000000">NUMERO DE MOTOR</font></b></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=3 height="21" align="left"><font size=3 color="#000000"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 align="left"><font size=3 color="#000000"><br>{{$salida->color}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=9 align="center"><font size=3 color="#000000"><br></font></td>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=17 rowspan=3 height="61" align="left" valign=top><b><font size=3 color="#000000">OBSERVACIONES: &nbsp; &nbsp;&nbsp; {{$coment}}</font></b></td>
		</tr>
	<tr>

		</tr>
	<tr>
		{{$salida->observacion}}
		</tr>
	<tr>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=7 height="23" align="left"><b><font size=3 color="#000000">Autorizado por:</font></b></td>
		<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" colspan=10 align="center"><b><font size=3 color="#000000">Firma de quien retira</font></b></td>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 rowspan=2 height="95" align="left" valign=top><b><font size=3 color="#000000">Firma responsable:</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=10 rowspan=2 align="left" valign=top><b><font size=3 color="#000000"><br></font></b></td>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan=7 height="23" align="left"><b><font size=3>Elaborada por:</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan=10 align="center"><font size=3 color="#969696"><br></font></td>
		</tr>
      @endforeach
</table>
<!-- ************************************************************************** -->
</body>

</html>
