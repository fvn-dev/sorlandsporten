<?php 
  /**
  * Fædrelandsvennen Åpenhetsportal ("Sørlandsporten")
  * version: 4
  * page: frontpage
  * info: static overview page
  */
  $pgTitle = "Sørlandsporten";

  include('head.php');
  include('menubrand.php');
?>

  <div class="container buttonRows">

    <div class="intro">
        <p>Alle kan lese postlistene til kommuner og andre offentlige etater. Vi har linker til postlistene for alle Agder-kommunene på denne siden, 
        sammen med viktige statlige institusjoner og kommunale foretak. Enhver kan be om innsyn i offentlige dokumenter, og det er gratis å gjøre det.</p> 
        <p>Fædrelandsvennen laget sommeren 2014 søkbare postjournaler for <a href="/open/kristiansand/">Kristiansand kommune</a>,
        <a href="/open/sshf/">Sørlandet Sykehus</a> og <a href="/open/uia/">for Universitetet i Agder</a>.</p>
    </div>

    <div class='row' >
      <h2>Status for digital tilgang på postlister hos kommunene</h2>
      <div class="col-sm-7" >
        <h4>Søkbare med arkiv</h4> 
        <ul>
          <li><a href="http://innsyn.birkenes.kommune.no/wfinnsyn.ashx?response=journalpost_postliste&amp;showresults=true" target="_blank"><button class="smallicons c928 btn btn-success btn-lg">Birkenes</button></a>
          <li><a href="http://www.flekkefjord.kommune.no/lokaldemokratipolitikk-rad-og-utvalg/postliste" target="_blank"> <button class="smallicons c1004 btn btn-success btn-lg">Flekkefjord</button></a>
          <li><a href="http://lillesand.kommune.no/Innsyn/" target="_blank"><button class="smallicons c926 btn btn-success btn-lg">Lillesand</button></a>
          <li><a href="http://innsyn.songdalen.kommune.no/wfinnsyn.ashx?response=journalpost_postliste" target="_blank"> <button class="smallicons c1070 btn btn-success btn-lg">Songdalen</button></a>
        </ul>
        <p>Disse kommunene har digitalt søkbare postlister og digitalt tilgjengelig arkiv og burde være forbilde for de øvrige kommunene i Agder.</p> 
        <div class="col-sm-10">
          <h4>Uten søkemotor</h4> 
          <ul>
          <li><a href="http://innsyn.audnedal.kommune.no/Publikum/Modules/Innsyn.aspx?mode=start" target="_blank"> <button class="smallicons c1027 btn btn-warning btn-lg">Audnedal</button></a>
          <li><a href="http://innsyn.haegebostad.kommune.no/Publikum/Modules/Innsyn.aspx?mode=start" target="_blank"> <button class="smallicons c1034 btn btn-warning btn-lg">Hægebostad</button></a>
          <li><a href="http://innsyn.kvinesdal.kommune.no/Publikum/Modules/innsyn.aspx?mode=start" target="_blank"> <button class="smallicons c1037 btn btn-warning btn-lg">Kvinesdal</button></a>
          <li><a href="http://www.lindesnes.kommune.no/min-side/postlister" target="_blank"> <button class="smallicons c1029 btn btn-warning btn-lg">Lindesnes</button></a>
          <li><a href="http://innsyn.mandal.kommune.no/Publikum/Modules/innsyn.aspx?mode=start" target="_blank"> <button class="smallicons c1002 btn btn-warning btn-lg">Mandal</button></a>
          <li><a href="http://innsyn.marnardal.kommune.no/Publikum/Modules/innsyn.aspx?mode=pl&SelPanel=0&ObjectType=ePhorteRegistryEntry&VariantType=Innsyn&ViewType=Table&Query=RecordDate%3a%28-7%29+AND+DocumentType%3a%28I%2cU%29" target="_blank"> <button class="smallicons c1021 btn btn-warning btn-lg">Marnardal</button></a>
          <li><a href="http://innsyn.sirdal.kommune.no/Publikum/Modules/innsyn.aspx?mode=pl&SelPanel=0&ObjectType=ePhorteRegistryEntry&VariantType=Innsyn&ViewType=Table&Query=RecordDate%3a(-7)+AND+DocumentType%3a(I%2cU)" target="_blank"> <button class="smallicons c1046 btn btn-warning btn-lg">Sirdal</button></a>
          <li><a href="http://vennesla.kommune.no/ojournal/" target="_blank"> <button class="smallicons c1014 btn btn-warning btn-lg">Vennesla</button></a>
          <li><a href="http://innsyn.aseral.kommune.no/Publikum/Modules/innsyn.aspx?mode=pl&SelPanel=0&ObjectType=ePhorteRegistryEntry&VariantType=Innsyn&ViewType=Table&Query=RecordDate:(-14)+AND+DocumentType:(I,U,N,X)" target="_blank"> <button class="smallicons c1026 btn btn-warning btn-lg">Åseral</button></a>
          </ul>
          <p>Disse kommunene har postlister lagt ut som tekst, men mangler søkemotor. Her kan det være lettere å søke via Google.</p>
        </div>
      </div>
      <div class="col-sm-5" >
        <h4>Søkbare</h4>
        <ul>
          <li><a href="http://www.arendal.kommune.no/Postliste/Postliste/#/16.04.2014/16.04.2014/" target="_blank"><button class="btn btn-info btn-lg c906 smallicons" >Arendal</button></a>
          <li><a href="http://159.171.48.136/eInnsynBygland/journalpost" target="_blank"><button class="btn btn-info btn-lg c938 smallicons">Bygland</button></a>
          <li><a href="http://159.171.48.136/eInnsynBykle/" target="_blank"><button class="btn btn-info btn-lg c941 smallicons">Bykle</button></a>
          <li><a href="http://159.171.48.136/eInnsynEvje/journalpost" target="_blank"><button class="btn btn-info btn-lg c937 smallicons">Evje og Hornnes</button></a>
          <li><a href="https://login.farsund.kommune.no/einnsyn"><button class="btn btn-info btn-lg c1003 smallicons ">Farsund</button></a>
          <li><a href="http://www.froland.kommune.no/Postliste/" target="_blank"><button class="btn btn-info btn-lg c919 smallicons">Froland</button></a>
          <li><a href="http://159.171.0.170/einnsyn-GJE/" target="_blank"><button class="btn btn-info btn-lg c911 smallicons">Gjerstad</button></a>
          <li><a href="http://www.grimstad.kommune.no/Politikk/Postliste/" target="_blank"><button class="btn btn-info btn-lg c904 smallicons">Grimstad</button></a>
          <li><a href="http://159.171.48.136/eInnsynIveland/" target="_blank"><button class="btn btn-info btn-lg c935 smallicons">Iveland</button></a>
          <li><a href="http://einnsyn.lyngdal.kommune.no/einnsyn/journalpost" target="_blank"><button class="btn btn-info btn-lg c1032 smallicons" >Lyngdal</button></a>
          <li><a href="http://159.171.0.170/einnsyn-RIS/" target="_blank"><button class="btn btn-info btn-lg c901 smallicons">Risør</button></a>
          <li><a href="http://212.37.255.195/eInnsyn/" target="new"><button class="btn btn-info btn-lg c1018 smallicons">Søgne</button></a>
          <li><a href="http://159.171.0.170/einnsyn-tve/" target="_blank"><button class="btn btn-info btn-lg c902 smallicons">Tvedestrand</button></a>
          <li><a href="http://159.171.48.136/eInnsynValle/journalpost" target="_blank"><button class="btn btn-info btn-lg c940 smallicons">Valle</button></a>
          <li><a href="http://159.171.0.170/einnsyn-VEG/" target="_blank"><button class="btn btn-info btn-lg c912 smallicons">Vegårshei</button></a>
          <li><a href="http://159.171.0.170/einnsyn-AML/" target="_blank"><button class="btn btn-info btn-lg c929 smallicons">Åmli</button></a>
          <li><a href="http://krs-postliste.cloudapp.net/" target="_blank"><button class="btn btn-info btn-lg c1001 smallicons">Kristiansand *</button> </a>
        </ul>   
        <p>Disse kommunene har søkbare postlister som fungerer rimelig bra. Knappene fører deg direkte til kommunenes egne sider. *) søkbart fra 1.8.2014</p> 
      </div>
    </div>

    <div class="row ">
      <h2>Søkeløsninger satt opp av Fædrelandsvennen</h2>
      <div class="col-sm-3">
        <a href="/open/kristiansand/" class="btn btn-warning ">Kristiansand</a> - søkbar historikk
      </div>
      <div class="col-sm-6">
        <a href="/open/uia/" class="btn btn-warning ">Universitetet i Agder</a> eller <a href="/open/universitet/" class="btn btn-warning ">alle norske universitet</a>
      </div>
      <div class="col-sm-3">
        <a href="/open/sshf/" class="btn btn-warning ">Sørlandet Sykehus</a>
      </div>
    </div>

   <div class="row">
      <h2>Andre offentlige postlister</h2>
      <div class="col-sm-3" >
        <h4>Uten søkemotor</h4>
        <ul>
          <li><a href="http://www.knutepunktsorlandet.no/fil.asp?FilkategoriId=89&back=1&MId1=248" target="_blank"><button class="btn btn-warning ">Knutepunkt<br>Sørlandet</button></a>
        </ul>
     </div>
      <div class="col-sm-9" >
        <h4>Digitalt søkbare postlister</h4>
        <ul>
          <li><a href="http://vaf.cloudapp.net/Journal/Search?expandSearch=1" target="_blank"><button class="btn btn-info ">Vest-Agder<br>fylkeskommune</button></a>
          <li><a href="http://www.austagderfk.no/eDemokrati-utvikling/Postliste/" target="_blank"><button class="btn btn-info ">Aust-Agder<br>fylkeskommune</button></a>
          <li><a href="http://www.ikava.no/sider/tekst.asp?side=207" target="_blank"><button class="btn btn-info ">Interkommunalt<br> arkiv i Vest-Agder</button></a>
          <li><a href="https://oep.no/search/advancedSearch.jsp" target="_blank"><button class="btn btn-info ">Departementer, direktorater <br>og fylkesmenn (OEP.no)</button></a>
        </ul>
      </div>
    </div>
<!-- /container -->
  </div> 


<?php 
  include('stats.php');
  include('footer.php');
?>