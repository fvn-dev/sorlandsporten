(function () {
    'use strict';

    var controllerId = 'docController';
    angular.module('app').controller(controllerId, ['docService', docController]);

    function docController(docService) {
      var dm = this;
      dm.title = 'documents';
      dm.projectid = '14480-uia';
      dm.activate = activate;

      dm.queries = [];
      dm.curQ = { querystring: '', timestamp: '', projectid: '', resultpage: 0 };
      dm.query = '';

      dm.totalDocs = 0;     
      dm.curDoc = {};
      dm.curPage = 1;
      dm.documents = [];

      dm.getDocuments = getDocuments;
      dm.getMoreDocuments = getMoreDocuments;
      dm.getCurrentDocument = getCurrentDocument;
      dm.isCurDoc = isCurDoc;
      dm.setCurDoc = setCurDoc;
      dm.getCurrentPage = getCurrentPage;
      dm.isCurPage = isCurPage;
      dm.setCurPage = setCurPage;

      dm.unis = [ 
        { name: 'Alle', projectid: '15196-alle-universitetene'},
        { name: 'UiA', projectid: '14480-uia', img: 'UiA_medium.gif'},
        { name: 'UiO', projectid: '15202-uio', img: 'UiO.png'}, 
        { name: 'UiB', projectid: '15201-uib', img: 'UiB.jpg'}, 
        { name: 'NTNU', projectid: '15197-ntnu', img: 'NTNU.png'}, 
        { name: 'UiS', projectid: '15195-uis', img: 'UiS.jpg'}, 
        { name: 'UiT', projectid: '15199-uit', img: 'UiT.jpg'}, 
        { name: 'UiN', projectid: '15198-uin', img: 'UiN.jpg'}, 
        { name: 'NMBU', projectid: '15200-nmbu', img: 'NMBU.jpg'}
      ];
      dm.isCurUni = isCurUni;
      dm.setCurUni = setCurUni;

      activate();

      function activate() {
        /*
          dm.query = 'Fædrelandsvennen';
          return getDocuments();
        */
         setCurUni( dm.unis[0] );
      }

      function getDocuments(){

        if (dm.query != '') {
          dm.curQ = { querystring: dm.query, timestamp: Date.now(), projectid: dm.projectid, resultpage: 1 };
          dm.queries.push(dm.curQ);
        }

          return docService.getAllDocs(dm.curQ).then(function(data){
 
              if (data.data.documents.length){ 
                dm.documents = data.data.documents;
                dm.totalDocs = data.data.total;
  
                angular.forEach(dm.documents, function(doc) {
                    doc.thmbUrl = doc.resources.page.image.replace("{size}", "thumbnail");
                    doc.pgUrl = doc.resources.page.image.replace("{size}", "large");
                    doc.displayTitle = doc.title; 
                    doc.curPage = 1;
                    doc.result = [];
                    doc.fullText = {};

                    doc.uni = doc.title.substring( 0, 4 );
                    //TODO trim string, loop dm.uni array and move email there
                    switch (doc.uni) {

                      case "UiA ":
                        doc.reqMail = 'post@uia.no';
                        break;
                      case "UiO ":
                        doc.reqMail = 'ads-sfesd-post@admin.uio.no';
                        break;
                      case "UiB ":
                        doc.reqMail = 'postmottak@uib.no';
                        break;
                      case "NTNU":
                        doc.reqMail = 'postmottak@adm.ntnu.no';
                        break;
                      case "UiS ":
                        doc.reqMail = 'dokumentsenteret@uis.no';
                        break;
                      case "UiT ":
                        doc.reqMail = 'postmottak@uit.no';
                        break;
                      case "UiN ":
                        doc.reqMail = 'postmottak@uin.no';
                        break;
                      case "NMBU":
                        doc.reqMail = 'dokumenttjenesten@nmbu.no';
                        break;  
                      default:
                        doc.reqMail = 'tips@fvn.no';
                    } 
                    
                  });

                dm.query = '';
                setCurDoc( dm.documents[0] ); 
              }

            return dm.documents;
          }) 
      }

      function getMoreDocuments(){

        var nextPage = dm.curQ.resultpage + 1;
        dm.curQ.resultpage = nextPage;

        return getDocuments();
      }

      function getCurrentDocument(){
        return docService.getCurDoc(dm.curQ, dm.curDoc.id).then(function(data){

          if (data.data.results.length){
            dm.curDoc.result = data.data.results;
            setCurPage( dm.curDoc.result[0]);
          }
          return dm.curDoc;
        })
      }

      function getCurrentPage(){
               
        return docService.getCurPg(dm.curDoc).then(function(data){

          dm.curDoc.fullText = data;              
          dm.curDoc.curText = dm.curDoc.fullText.data;
          dm.curDoc.cases = [];

          var rxCase = new RegExp('20[\\d]{2}/[\\d]{1,4}-[\\d]{1,3}', 'g');
          var caseArray = dm.curDoc.curText.match(rxCase);

          if (caseArray !== null){

            var rxTitle = new RegExp('(?!<=Sakstittel: )([^:])+(?=DokType)', 'g');
            var titleArray = []; 
            titleArray = dm.curDoc.curText.match(rxTitle);

            if (titleArray !== null){
              for (var i = 0; i < caseArray.length; i++) {dm.curDoc.cases.push({id: caseArray[i], title: titleArray[i]  }); }
            } else {
              for (var i = 0; i < caseArray.length; i++) {dm.curDoc.cases.push({id: caseArray[i], title: ''  }); }
            }
          } else {
            dm.curDoc.cases.push({id: '', title: 'Søk om innsyn'  }); 
          }

          return dm.curPage;
        })

      }

      function setCurDoc(doc){
        dm.curDoc = doc;
        getCurrentDocument();
        return dm;
      }

      function isCurDoc(doc){
        return !!(dm.curDoc === doc);
      }

      function setCurPage(pg){
        dm.curDoc.curPage = pg;
        getCurrentPage();
        return dm.curDoc;
      }

      function isCurPage(pg){
        return !!(dm.curDoc.curPage === pg);
      }


      function setCurUni(uni){
        dm.projectid = uni.projectid;
        dm.curUni = uni;
        return dm.curUni;
      }

      function isCurUni(uni){
        return !!(dm.curUni === uni);
      }

    }
})();