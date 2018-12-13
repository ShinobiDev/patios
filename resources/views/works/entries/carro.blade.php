<h3 class="text-red">Carro</h3>
<button type="button" class="btnna pull-right">N/A</button>
<button type="button" class="btnmalo pull-right">Malo</button>
<button type="button" class="btnregular pull-right">Regular</button>
<button type="button" class="btnbueno pull-right">Bueno</button>


<br><hr>


<form method="POST" action="{{route('inventaries.inventario', $entry->id)}}">
  {{csrf_field()}}

  <div class="">
    <label for='farolas-delanteras'>1. Farolas Delanteras &nbsp; &nbsp;</label>
    <span style="float:right">
        <input type="radio" name="Farolas Delanteras" id="Farolas Delanteras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="Farolas Delanteras" id="Farolas Delanteras2" value="Regular" class="regular"> Regular
        <input type="radio" name="Farolas Delanteras" id="Farolas Delanteras3" value="Malo" class="malo"> Malo
        <input type="radio" name="Farolas Delanteras" id="Farolas Delanteras4" value="N/A" class="noaplica"> N/A
    </span>
  </div>
  <div class="">
    <label for='farolas-traseras'>2. Farolas Taseras &nbsp; &nbsp;</label>
    <span style="float:right">
      <input type="radio" name="farolas-traseras" id="farolas-traseras1" value="Bueno" class="bueno"> Bueno
      <input type="radio" name="farolas-traseras" id="farolas-traseras2" value="Regular" class="regular"> Regular
      <input type="radio" name="farolas-traseras" id="farolas-traseras3" value="Malo" class="malo"> Malo
      <input type="radio" name="farolas-traseras" id="farolas-traseras4" value="N/A" class="noaplica"> N/A
    </span>
  </div>
  <div class="">
    <label for='espejos-laterales'>3. Espejos Laterales &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="espejos-laterales" id="espejos-laterales1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="espejos-laterales" id="espejos-laterales2" value="Regular" class="regular"> Regular
        <input type="radio" name="espejos-laterales" id="espejos-laterales3" value="Malo" class="malo"> Malo
        <input type="radio" name="espejos-laterales" id="espejos-laterales4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='tapa-gasolina'>4. Tapa Gasolina &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="tapa-gasolina" id="tapa-gasolina1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="tapa-gasolina" id="tapa-gasolina2" value="Regular" class="regular"> Regular
        <input type="radio" name="tapa-gasolina" id="tapa-gasolina3" value="Malo" class="malo"> Malo
        <input type="radio" name="tapa-gasolina" id="tapa-gasolina4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='persiana'>5. persiana &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="persiana" id="persiana1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="persiana" id="persiana2" value="Regular" class="regular"> Regular
        <input type="radio" name="persiana" id="persiana3" value="Malo" class="malo"> Malo
        <input type="radio" name="persiana" id="persiana4" value="N/A" class="noaplica"> N/A
     </span>
  </div>

  <div class="">
    <label for='llanta-repuesto'>6. Llanta Repuesto &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="llanta-repuesto" id="llanta-repuesto1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="llanta-repuesto" id="llanta-repuesto2" value="Regular" class="regular"> Regular
        <input type="radio" name="llanta-repuesto" id="llanta-repuesto3" value="Malo" class="malo"> Malo
        <input type="radio" name="llanta-repuesto" id="llanta-repuesto4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='rines-lujo-delantero'>7. Rines lujo Delantero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="rines-lujo-delantero" id="rines-lujo-delantero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="rines-lujo-delantero" id="rines-lujo-delantero2" value="Regular" class="regular"> Regular
        <input type="radio" name="rines-lujo-delantero" id="rines-lujo-delantero3" value="Malo" class="malo"> Malo
        <input type="radio" name="rines-lujo-delantero" id="rines-lujo-delantero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='rines-lujo-trasero'>8. Rines Lujo Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="rines-lujo-trasero" id="rines-lujo-trasero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="rines-lujo-trasero" id="rines-lujo-trasero2" value="Regular" class="regular"> Regular
        <input type="radio" name="rines-lujo-trasero" id="rines-lujo-trasero3" value="Malo" class="malo"> Malo
        <input type="radio" name="rines-lujo-trasero" id="rines-lujo-trasero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='rines-hierro-delantero'>9. Rines Hierro Delantero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="rines-hierro-delantero" id="rines-hierro-delantero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="rines-hierro-delantero" id="rines-hierro-delantero2" value="Regular" class="regular"> Regular
        <input type="radio" name="rines-hierro-delantero" id="rines-hierro-delantero3" value="Malo" class="malo"> Malo
        <input type="radio" name="rines-hierro-delantero" id="rines-hierro-delantero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='rines-hierro-trasero'>10. Rines Hierro Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="rines-hierro-trasero" id="rines-hierro-trasero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="rines-hierro-trasero" id="rines-hierro-trasero2" value="Regular" class="regular"> Regular
        <input type="radio" name="rines-hierro-trasero" id="rines-hierro-trasero3" value="Malo" class="malo"> Malo
        <input type="radio" name="rines-hierro-trasero" id="rines-hierro-trasero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='Tapa-rines-delantero'>11. Tapa Rines Delantero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="Tapa-rines-delantero" id="Tapa-rines-delantero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="Tapa-rines-delantero" id="Tapa-rines-delantero2" value="Regular" class="regular"> Regular
        <input type="radio" name="Tapa-rines-delantero" id="Tapa-rines-delantero3" value="Malo" class="malo"> Malo
        <input type="radio" name="Tapa-rines-delantero" id="Tapa-rines-delantero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='Tapa-rines-trasero'>12. Tapa Rines Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="Tapa-rines-trasero" id="Tapa-rines-trasero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="Tapa-rines-trasero" id="Tapa-rines-trasero2" value="Regular" class="regular"> Regular
        <input type="radio" name="Tapa-rines-trasero" id="Tapa-rines-trasero3" value="Malo" class="malo"> Malo
        <input type="radio" name="Tapa-rines-trasero" id="Tapa-rines-trasero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='boceles'>13. Boceles &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="boceles" id="boceles1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="boceles" id="boceles2" value="Regular" class="regular"> Regular
        <input type="radio" name="boceles" id="boceles3" value="Malo" class="malo"> Malo
        <input type="radio" name="boceles" id="boceles4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='placa'>14. Placa &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="placa" id="placa1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="placa" id="placa2" value="Regular" class="regular"> Regular
        <input type="radio" name="placa" id="placa3" value="Malo" class="malo"> Malo
        <input type="radio" name="placa" id="placa4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='emblemas'>15. Emblemas &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="emblemas" id="emblemas1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="emblemas" id="emblemas2" value="Regular" class="regular"> Regular
        <input type="radio" name="emblemas" id="emblemas3" value="Malo" class="malo"> Malo
        <input type="radio" name="emblemas" id="emblemas4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='plumillas-limpiabrisas'>16. Plumillas Limpiabrisas &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="plumillas-limpiabrisas" id="plumillas-limpiabrisas1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="plumillas-limpiabrisas" id="plumillas-limpiabrisas2" value="Regular" class="regular"> Regular
        <input type="radio" name="plumillas-limpiabrisas" id="plumillas-limpiabrisas3" value="Malo" class="malo"> Malo
        <input type="radio" name="plumillas-limpiabrisas" id="plumillas-limpiabrisas4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='stop-trasero'>17. Stop Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="stop-trasero" id="stop-trasero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="stop-trasero" id="stop-trasero2" value="Regular" class="regular"> Regular
        <input type="radio" name="stop-trasero" id="stop-trasero3" value="Malo" class="malo"> Malo
        <input type="radio" name="stop-trasero" id="stop-trasero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='panoramico'>18. Panoramico &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="panoramico" id="panoramico1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="panoramico" id="panoramico2" value="Regular" class="regular"> Regular
        <input type="radio" name="panoramico" id="panoramico3" value="Malo" class="malo"> Malo
        <input type="radio" name="panoramico" id="panoramico4" value="N/A" class="noaplica"> N/A
     </span>
  </div>

  <div class="">
    <label for='vidrio-puerta-delanteras'>19. Vidrio Puerta Delanteras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="vidrio-puerta-delanteras" id="vidrio-puerta-delanteras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="vidrio-puerta-delanteras" id="vidrio-puerta-delanteras2" value="Regular" class="regular"> Regular
        <input type="radio" name="vidrio-puerta-delanteras" id="vidrio-puerta-delanteras3" value="Malo" class="malo"> Malo
        <input type="radio" name="vidrio-puerta-delanteras" id="vidrio-puerta-delanteras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='vidrio-puerta-trasera'>20. Vidrio Puerta Trasera &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="vidrio-puerta-trasera" id="vidrio-puerta-trasera1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="vidrio-puerta-trasera" id="vidrio-puerta-trasera2" value="Regular" class="regular"> Regular
        <input type="radio" name="vidrio-puerta-trasera" id="vidrio-puerta-trasera3" value="Malo" class="malo"> Malo
        <input type="radio" name="vidrio-puerta-trasera" id="vidrio-puerta-trasera4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='vidrio-trasero'>21. Vidrio Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="vidrio-trasero" id="vidrio-trasero1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="vidrio-trasero" id="vidrio-trasero2" value="Regular" class="regular"> Regular
        <input type="radio" name="vidrio-trasero" id="vidrio-trasero3" value="Malo" class="malo"> Malo
        <input type="radio" name="vidrio-trasero" id="vidrio-trasero4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='Batería'>22. Batería &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="Batería" id="Batería1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="Batería" id="Batería2" value="Regular" class="regular"> Regular
        <input type="radio" name="Batería" id="Batería3" value="Malo" class="malo"> Malo
        <input type="radio" name="Batería" id="Batería4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='manillas-externas-delanteras'>23. Manillas Externas Delanteras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="manillas-externas-delanteras" id="manillas-externas-delanteras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="manillas-externas-delanteras" id="manillas-externas-delanteras2" value="Regular" class="regular"> Regular
        <input type="radio" name="manillas-externas-delanteras" id="manillas-externas-delanteras3" value="Malo" class="malo"> Malo
        <input type="radio" name="manillas-externas-delanteras" id="manillas-externas-delanteras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='manillas-externas-traseras'>24. Manillas Externas Traseras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="manillas-externas-traseras" id="manillas-externas-traseras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="manillas-externas-traseras" id="manillas-externas-traseras2" value="Regular" class="regular"> Regular
        <input type="radio" name="manillas-externas-traseras" id="manillas-externas-traseras3" value="Malo" class="malo"> Malo
        <input type="radio" name="manillas-externas-traseras" id="manillas-externas-traseras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='llantas-delanteras'>25. Llantas Delanteras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="llantas-delanteras" id="llantas-delanteras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="llantas-delanteras" id="llantas-delanteras2" value="Regular" class="regular"> Regular
        <input type="radio" name="llantas-delanteras" id="llantas-delanteras3" value="Malo" class="malo"> Malo
        <input type="radio" name="llantas-delanteras" id="llantas-delanteras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='llantas-traseras'>26. Llantas Traseras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="llantas-traseras" id="llantas-traseras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="llantas-traseras" id="llantas-traseras2" value="Regular" class="regular"> Regular
        <input type="radio" name="llantas-traseras" id="llantas-traseras3" value="Malo" class="malo"> Malo
        <input type="radio" name="llantas-traseras" id="llantas-traseras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='puertas-delanteras'>27. Puerta Delanteras &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="puertas-delanteras" id="puertas-delanteras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="puertas-delanteras" id="puertas-delanteras2" value="Regular" class="regular"> Regular
        <input type="radio" name="puertas-delanteras" id="puertas-delanteras3" value="Malo" class="malo"> Malo
        <input type="radio" name="puertas-delanteras" id="puertas-delanteras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='puertas-traseras'>28. Amortiguador Trasero &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="puertas-traseras" id="puertas-traseras1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="puertas-traseras" id="puertas-traseras2" value="Regular" class="regular"> Regular
        <input type="radio" name="puertas-traseras" id="puertas-traseras3" value="Malo" class="malo"> Malo
        <input type="radio" name="puertas-traseras" id="puertas-traseras4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='radio'>29. Radio &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="radio" id="radio1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="radio" id="radio2" value="Regular" class="regular"> Regular
        <input type="radio" name="radio" id="radio3" value="Malo" class="malo"> Malo
        <input type="radio" name="radio" id="radio4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='parlantes'>30. Parlantes &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="parlantes" id="parlantes1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="parlantes" id="parlantes2" value="Regular" class="regular"> Regular
        <input type="radio" name="parlantes" id="parlantes3" value="Malo" class="malo"> Malo
        <input type="radio" name="parlantes" id="parlantes4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='gato'>31. Gato &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="gato" id="gato1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="gato" id="gato2" value="Regular" class="regular"> Regular
        <input type="radio" name="gato" id="gato3" value="Malo" class="malo"> Malo
        <input type="radio" name="gato" id="gato4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='cruzeta'>32. Cruzeta &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="cruzeta" id="cruzeta1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="cruzeta" id="cruzeta2" value="Regular" class="regular"> Regular
        <input type="radio" name="cruzeta" id="cruzeta3" value="Malo" class="malo"> Malo
        <input type="radio" name="cruzeta" id="cruzeta4" value="N/A" class="noaplica"> N/A
     </span>
  </div>

  <div class="">
    <label for='espejo-interior'>33. Espejo Interior &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="espejo-interior" id="espejo-interior1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="espejo-interior" id="espejo-interior2" value="Regular" class="regular"> Regular
        <input type="radio" name="espejo-interior" id="espejo-interior3" value="Malo" class="malo"> Malo
        <input type="radio" name="espejo-interior" id="espejo-interior4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <div class="">
    <label for='equipo-carretera'>34. Equipo Carretera &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="equipo-carretera" id="equipo-carretera1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="equipo-carretera" id="equipo-carretera2" value="Regular" class="regular"> Regular
        <input type="radio" name="equipo-carretera" id="equipo-carretera3" value="Malo" class="malo"> Malo
        <input type="radio" name="equipo-carretera" id="equipo-carretera4" value="N/A" class="noaplica"> N/A
     </span>
  </div>

  <!--<div class="">
    <label for='bateria'>35. Bateria &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="bateria" id="bateria1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="bateria" id="bateria2" value="Regular" class="regular"> Regular
        <input type="radio" name="bateria" id="bateria3" value="Malo" class="malo"> Malo
        <input type="radio" name="" id="4" value="N/A" class="noaplica"> N/A
     </span>
  </div>-->
  <div class="">
    <label for='llaves'>35. Llaves &nbsp; &nbsp;</label>
      <span style="float:right">
        <input type="radio" name="llaves" id="llaves1" value="Bueno" class="bueno"> Bueno
        <input type="radio" name="llaves" id="llaves2" value="Regular" class="regular"> Regular
        <input type="radio" name="llaves" id="llaves3" value="Malo" class="malo"> Malo
        <input type="radio" name="llaves" id="llaves4" value="N/A" class="noaplica"> N/A
     </span>
  </div>
  <br>

  <button type="submit" class="btn btn-primary btn-block">Guardar</button>
</form>
