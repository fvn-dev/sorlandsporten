<?php 
  /**
  * Fædrelandsvennen Åpenhetsportal ("Sørlandsporten")
  * version: 3
  * page: univsersitet
  * info: multi project search with DocumentCloud for all Universities (defined in docController)
  */
  $pgTitle = "Søk i postjournalen til alle norske universitet";

  include('../head.php');
  include('../menubrand.php');
?>
 
  <div class="container fullImg" id="ng-app" data-ng-app="app">

    <div class=""  data-ng-controller="docController as dm">

      <div class="intro row">
        <div class="col-sm-9"><h2>Søk i postjournalen til alle norske universitet</h2>  
          <p>Ved hjelp av DocumentCloud har Fædrelandsvennen har gjort postlista til alle norske universitet søkbar tilbake til 2011.
          <em>Unntaket er UiT, som foreløpig ikke har gitt oss innsyn i postlistene fra 2013 og fremover, her tilbyr vi bare søk i to årganger.</em></p> 
          <p>Den første trefflisten viser postlister som inneholder søkeordet ditt. Markér et dokument, og sidene med søkeordet vil vises.Markér en av disse sidene, og den vises stort i feltet til høyre. </p>
          <p>Når du finner et dokument du vil bestille, merker du deg saksnummer og dokumentnummer. Klikk så på den tilhørende knappen og bestill.</p> 
        </div>
        <div class="col-sm-3">
            <h4>Se universitetene sine egne løsninger:</h4>
            <ul class='uniLinks'>
              <li>Søkbar, tre måneder historikk: <a href="http://uit.no/om/offjour" target="_blank">UiT</a></li>
              <li>Ikke søkbar, tre måneder historikk: 
                <a href="http://www.uia.no/om-uia/tall-og-fakta/offentlig-journal" target="_blank">UiA</a>, 
                <a href="http://www.uio.no/om/journal/" target="_blank">UiO</a>,
                <a href="http://www.uib.no/info/offjournal/" target="_blank">UiB</a>, 
                <a href="http://www.ntnu.no/aktuelt/offentlig-journal" target="_blank">NTNU</a>, 
                <a href="https://www.uis.no/om-uis/nyheter-og-presserom/presserom/postjournal/?s=8836" target="_blank">UiS</a>
              </li>
              <li>Publiserer ikke postjournal i dag:
                <a href="http://www.nmbu.no" target="_blank">NMBU</a>, 
                <a href="http://www.uin.no" target="_blank">UiN</a>
              </li>
            </ul>

        </div>
      </div>

      <div class='row' >     

        <div class='col-sm-12 '>
          <form ng-submit="dm.getDocuments()">
            <div class="buttonRows row"><ul class="uniList ">
              <li data-ng-repeat="uni in dm.unis" >
                <button class='btn' data-ng-class="{'btn-primary': dm.isCurUni(uni)}" data-ng-click="dm.setCurUni(uni)">
                  <img ng-src="http://static.fvn.no/img/logo/{{uni.img}}" > {{uni.name}}
                </button>
              </li>
            </ul></div>
            <input type="text" class="fullSearch" ng-model="dm.query" placeholder="Eksempel: fakultet" />
            <input type="submit" class="btn btn-lg btn-success"  value="Søk i postjournalen" />

            </form>
          <p><em>Søket fra Document Cloud støtter desverre ikke oppsettet til Internet Explorer, prøv en annen nettleser eller mobil.</em></p>
        </div>  
       
      </div><!--search row -->

      <div class='row resultsWrap ' ng-show='dm.totalDocs'>
        <div class='col-sm-12'>
          <h4>Treff i {{dm.totalDocs}} dokumenter</h4>
          <span class="resultPaginate">Viser treff {{(dm.documents.length * (dm.curQ.resultpage-1)) +1 }} - {{dm.documents.length * dm.curQ.resultpage }}</span>
          <ul class="resultList">
              <li data-ng-repeat="docu in dm.documents track by docu.id" >
                <button class='btn' data-ng-class="{'btn-primary': dm.isCurDoc(docu)}" data-ng-click="dm.setCurDoc(docu)">{{docu.displayTitle}}</button>
              </li>
          </ul>
         <button data-ng-click="dm.getMoreDocuments()" class="btn btn-sm btn-success">Hent neste {{dm.documents.length}} dokumenter med treff </button>
        </div>
      </div>

      <div class='row resultsWrap ' ng-show="dm.curDoc.curPage">
        <h1>Viser detaljer for valgt dokument: {{dm.curDoc.displayTitle}}</h1>
        <div class='col-sm-2'>
          <h4>Sider med treff</h4>
          <ul class='pageList'>
            <li data-ng-repeat="page in dm.curDoc.result" >
              <button class="btn" data-ng-class="{'btn-primary': dm.isCurPage(page)}" data-ng-click="dm.setCurPage(page)">
                <img ng-src='{{dm.curDoc.thmbUrl.replace("{page}", page)}}'><br>Side {{page}}
              </button>
            </li>
          </ul>
        </div>

        <div class='col-sm-10 pageWrap' >
          <h4>Be {{dm.curDoc.uni}} om innsyn:</h4>
          <ul class='caseList'>
            <li data-ng-repeat="case in dm.curDoc.cases" >
              <a class="btn btn-warning"  
              ng-href='mailto:{{dm.curDoc.reqMail}}?subject=Innsynsbegjæring&body=Søker%20om%20innsyn%20i%20saksnummer%20{{case.id}}%20-%20{{case.title}}'>
              {{case.id}}</a>
              {{case.title}}
            </li>
          </ul>
          <div class="pageImg">
            <img ng-src='{{dm.curDoc.pgUrl.replace("{page}", dm.curDoc.curPage)}}'>
          </div>
          <div class="pageText">
            <h6>Tekst fra siden: <em>(Maskinelt lest via Document Cloud)</em></h6>
            <pre>{{dm.curDoc.curText}}</pre>
          </div>
          
        </div>

      </div><!-- results -->

    </div><!-- dm -->
  </div> <!-- container app-->

  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.8/angular.min.js'></script>
  <script type='text/javascript' >
   'use strict';

    var app = angular.module('app', [  ]);
    app.run(['$rootScope', function ($rootScope) {   }]);
  </script>
  <script type='text/javascript' src='docController.js'></script>
  <script type='text/javascript' src='../docService.js'></script>

<?php 
  include('../stats.php');
  include('../footer.php');
?>