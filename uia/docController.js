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

      activate();

      function activate() {
        /*
          dm.query = 'hånes';
          return getDocuments();
        */
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
                    doc.displayTitle = doc.title; //.replace("Kristiansand ", "");
                    doc.curPage = 1;
                    doc.result = [];
                    doc.fullText = {};

                    doc.uni = doc.title.substring( 0, 3 );
                    switch (doc.uni) {
                      case "UiA":
                        doc.reqMail = 'post@uia.no';
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
    }
})();