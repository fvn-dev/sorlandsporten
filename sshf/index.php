<?php 
  /**
  * Fædrelandsvennen Åpenhetsportal ("Sørlandsporten")
  * version: 3
  * page: uia
  * info: single project search with DocumentCloud for University of Agder
  */
  $pgTitle = "Søk Sørlandet Sykehus sin postjournal";

  include('../head.php');
  include('../menubrand.php');
?>
 
<div class="container fullImg" id="ng-app" data-ng-app="app">

  <div class=""  data-ng-controller="docController as dm">

   <div class="intro row">
    <div class="col-sm-4"><img src="http://static.fvn.no/img/logo/sshf.jpg" ></div>
    <div class="col-sm-8"><h2>Søk i Sørlandet Sykehus sin postjournal</h2>  
      <p> Ved hjelp av DocumentCloud har Fædrelandsvennen har gjort postlista søkbar. </p> 
      <p>Den første trefflisten viser postlister som inneholder søkeordet ditt. Markér et dokument, og sidene med søkeordet vil vises. Markér en av disse sidene, og den vises stort i feltet til høyre. </p>
      <p>Når du finner et dokument du vil bestille, merker du deg saksnummer - Klikk så på riktig knapp og bestill.</p> 
      <p>Se <a href="http://www.sorlandet-sykehus.no/media/postjournal" target="_blank">Sørlandet Sykehus</a> sin egen løsning (pdf filer)</p>
      
      </div>
    </div>

    <div class='row' >     

      <div class='col-sm-11 col-sm-offset-1'>
        <form ng-submit="dm.getDocuments()">
          <input type="text" class="fullSearch" ng-model="dm.query" placeholder="Eksempel: sykehus" />
          <input type="submit" class="btn btn-lg btn-success"  value="Søk i postjournalen" />
          <div class="radio_inline">
            <label ><input type="radio" name="projectid" ng-model="dm.projectid" value="15358-sshf" checked>SSHF</label>              
          </div> 
        </form>
        <em>Søket fra Document Cloud støtter desverre ikke oppsettet til Internet Explorer, prøv en annen nettleser eller mobil.</em>
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
        <em>(OBS! Sjekk siste siffer i journalnummer mot bildet)</em>
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

  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.19/angular.min.js'></script>
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