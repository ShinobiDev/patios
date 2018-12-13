<h3 class="text-red">Motocicletas</h3>

<button type="button" class="btnmalos pull-right">Malo</button>
<button type="button" class="btnregulars pull-right">Regular</button>
<button type="button" class="btnbuenos pull-right">Bueno</button>
<br><hr>

<form method="POST" name="f1" action="{{route('inventaries.inventario', $entry->id)}}">
  {{csrf_field()}}
  <div class="">
    <label for='carenaje'>1. Carenaje &nbsp; &nbsp;</label>
    <span style="float:right">
        <input type="radio" name="carenaje" id="carenaje1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="carenaje" id="carenaje2" value="Regular" class="regulars"> Regular
        <input type="radio" name="carenaje" id="carenaje3" value="Malo" class="malos"> Malo
    </span>
  </div>
  <div class="">
    <label for='farola'>2. Farola &nbsp; &nbsp;</label>
    <span style="float:right">
      <input type="radio" name="farola" id="farola1" value="Bueno" class="buenos"> Bueno
      <input type="radio" name="farola" id="farola2" value="Regular" class="regulars"> Regular
      <input type="radio" name="farola" id="farola3" value="Malo" class="malos"> Malo
    </span>
  </div>
  <div class="">
    <label for='telescopio'>3. Telescopio &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="telescopio" id="telescopio1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="telescopio" id="telescopio2" value="Regular" class="regulars"> Regular
        <input type="radio" name="telescopio" id="telescopio3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='guadabarros'>4. Guardabarros &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="guadabarros" id="guadabarros1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="guadabarros" id="guadabarros2" value="Regular" class="regulars"> Regular
        <input type="radio" name="guadabarros" id="guadabarros3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='direccionales'>5. Direccionales &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="direccionales" id="direccionales1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="direccionales" id="direccionales2" value="Regular" class="regulars"> Regular
        <input type="radio" name="direccionales" id="direccionales3" value="Malo" class="malos"> Malo
     </span>
  </div>

  <div class="">
    <label for='manilares'>6. Manilares &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="manilares" id="manilares1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="manilares" id="manilares2" value="Regular" class="regulars"> Regular
        <input type="radio" name="manilares" id="manilares3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='protector-manilares'>7. Protector Manilares &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="protector-manilares" id="protector-manilares1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="protector-manilares" id="protector-manilares2" value="Regular" class="regulars"> Regular
        <input type="radio" name="protector-manilares" id="protector-manilares3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='manigueta'>8. Manigueta &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="manigueta" id="manigueta1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="manigueta" id="manigueta2" value="Regular" class="regulars"> Regular
        <input type="radio" name="manigueta" id="manigueta3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='mango-acelerador'>9. Mango Acelerador &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="mango-acelerador" id="mango-acelerador1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="mango-acelerador" id="mango-acelerador2" value="Regular" class="regulars"> Regular
        <input type="radio" name="mango-acelerador" id="mango-acelerador3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='espejos'>10. Espejos &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="espejos" id="espejos1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="espejos" id="espejos2" value="Regular" class="regulars"> Regular
        <input type="radio" name="espejos" id="espejos3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='tacometro'>11. Tacometro &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="tacometro" id="tacometro1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="tacometro" id="tacometro2" value="Regular" class="regulars"> Regular
        <input type="radio" name="tacometro" id="tacometro3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='swichet'>12. Swichet &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="swichet" id="swichet1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="swichet" id="swichet2" value="Regular" class="regulars"> Regular
        <input type="radio" name="swichet" id="swichet3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='encendido'>13. Encendido &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="encendido" id="encendido1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="encendido" id="encendido2" value="Regular" class="regulars"> Regular
        <input type="radio" name="encendido" id="encendido3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='pito'>14. Pito &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="pito" id="pito1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="pito" id="pito2" value="Regular" class="regulars"> Regular
        <input type="radio" name="pito" id="pito3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='freno-delantero'>15. Freno Delantero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="freno-delantero" id="freno-delantero1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="freno-delantero" id="freno-delantero2" value="Regular" class="regulars"> Regular
        <input type="radio" name="freno-delantero" id="freno-delantero3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='patada-crank'>16. Patada Crank &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="patada-crank" id="patada-crank1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="patada-crank" id="patada-crank2" value="Regular" class="regulars"> Regular
        <input type="radio" name="patada-crank" id="patada-crank3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='tanque-gasolina'>17. Tanque Gasolina &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="tanque-gasolina" id="tanque-gasolina1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="tanque-gasolina" id="tanque-gasolina2" value="Regular" class="regulars"> Regular
        <input type="radio" name="tanque-gasolina" id="tanque-gasolina3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='tapa-tanque-gasolina'>18. Tapa Tanque Gasolina &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="tapa-tanque-gasolina" id="tapa-tanque-gasolina1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="tapa-tanque-gasolina" id="tapa-tanque-gasolina2" value="Regular" class="regulars"> Regular
        <input type="radio" name="tapa-tanque-gasolina" id="tapa-tanque-gasolina3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='sillin'>19. Sillin &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="sillin" id="sillin1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="sillin" id="sillin2" value="Regular" class="regulars"> Regular
        <input type="radio" name="sillin" id="sillin3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='tapa-laterales'>20. Tapa Laterales &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="tapa-laterales" id="tapa-laterales1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="tapa-laterales" id="tapa-laterales2" value="Regular" class="regulars"> Regular
        <input type="radio" name="tapa-laterales" id="tapa-laterales3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='defensa'>21. Defensa &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="defensa" id="defensa1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="defensa" id="defensa2" value="Regular" class="regulars"> Regular
        <input type="radio" name="defensa" id="defensa3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='Batería'>22. Batería &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="Batería" id="Batería1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="Batería" id="Batería2" value="Regular" class="regulars"> Regular
        <input type="radio" name="Batería" id="Batería3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='Motor'>23. Motor &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="Motor" id="Motor1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="Motor" id="Motor2" value="Regular" class="regulars"> Regular
        <input type="radio" name="Motor" id="Motor3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='descarga-Pies'>24. Descarga-Pies &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="descarga-Pies" id="descarga-Pies1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="descarga-Pies" id="descarga-Pies2" value="Regular" class="regulars"> Regular
        <input type="radio" name="descarga-Pies" id="descarga-Pies3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='palanca-cambios'>25. Palanca Cambios &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="palanca-cambios" id="palanca-cambios1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="palanca-cambios" id="palanca-cambios2" value="Regular" class="regulars"> Regular
        <input type="radio" name="palanca-cambios" id="palanca-cambios3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='freno-trasero'>26. Freno Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="freno-trasero" id="freno-trasero1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="freno-trasero" id="freno-trasero2" value="Regular" class="regulars"> Regular
        <input type="radio" name="freno-trasero" id="freno-trasero3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='pata-estazonamiento'>27. Pata Estacionamiento &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="pata-estacionamiento" id="pata-estacionamiento1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="pata-estacionamiento" id="pata-estacionamiento2" value="Regular" class="regulars"> Regular
        <input type="radio" name="pata-estacionamiento" id="pata-estacionamiento3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='amortizador-trasero'>28. Amortiguador Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="amortizador-trasero" id="amortizador-trasero1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="amortizador-trasero" id="amortizador-trasero2" value="Regular" class="regulars"> Regular
        <input type="radio" name="amortizador-trasero" id="amortizador-trasero3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='cadena'>29. Cadena &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="cadena" id="cadena1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="cadena" id="cadena2" value="Regular" class="regulars"> Regular
        <input type="radio" name="cadena" id="cadena3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='guarda-cadena'>30. Guarda Cadena &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="guarda-cadena" id="guarda-cadena1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="guarda-cadena" id="guarda-cadena2" value="Regular" class="regulars"> Regular
        <input type="radio" name="guarda-cadena" id="guarda-cadena3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='exosto'>31. Exosto &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="exosto" id="exosto1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="exosto" id="exosto2" value="Regular" class="regulars"> Regular
        <input type="radio" name="exosto" id="exosto3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='exosto'>32. Regilla Exosto &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="regilla_exosto" id="regilla_exosto1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="regilla_exosto" id="regilla_exosto2" value="Regular" class="regulars"> Regular
        <input type="radio" name="regilla_exosto" id="regilla_exosto3" value="Malo" class="malos"> Malo
     </span>
  </div>

  <div class="">
    <label for='stop'>33. Stop &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="stop" id="stop1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="stop" id="stop2" value="Regular" class="regulars"> Regular
        <input type="radio" name="stop" id="stop3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='porta-placa'>34. Porta Placa &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="porta-placa" id="porta-placa1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="porta-placa" id="porta-placa2" value="Regular" class="regulars"> Regular
        <input type="radio" name="porta-placa" id="porta-placa3" value="Malo" class="malos"> Malo
     </span>
  </div>

  <div class="">
    <label for='parrilla'>35. Parrilla &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="parrilla" id="parrilla1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="parrilla" id="parrilla2" value="Regular" class="regulars"> Regular
        <input type="radio" name="parrilla" id="parrilla3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <div class="">
    <label for='llaves'>36. Llaves &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="llaves" id="llaves1" value="Bueno" class="buenos"> Bueno
        <input type="radio" name="llaves" id="llaves2" value="Regular" class="regulars"> Regular
        <input type="radio" name="llaves" id="llaves3" value="Malo" class="malos"> Malo
     </span>
  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-block">Guardar</button>
</form>
