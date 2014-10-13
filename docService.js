(function () {
    'use strict';

    var serviceId = 'docService';
    angular.module('app').factory(serviceId, ['$http', docService]);

    function docService( $http ) {
      var service = {
        getAllDocs: getAllDocs,
        getCurDoc: getCurDoc,
        getCurPg: getCurPg
      };
      return service;

      function getAllDocs( queryO ) {

        var dcUrl = 'https://www.documentcloud.org/api/search?q=', pidUrl = '%20projectid:',
          pgUrl = '&per_page=20&page=',
          cbUrl = '&callback=JSON_CALLBACK', searchMethod = 'JSONP' ;

        var dcSearch = dcUrl + queryO.querystring + pidUrl + queryO.projectid + pgUrl + queryO.resultpage + cbUrl;

        return $http({method: searchMethod, url: dcSearch }).
          success(function(data, status, headers, config) {   return data;        }).
          error(function(data, status, headers, config) {          });
      }

      function getCurDoc( queryO, docId ) {

        var dcUrl = 'https://www.documentcloud.org/documents/', searchUrl = '/search?q=',
          cbUrl = '&callback=JSON_CALLBACK', searchMethod = 'JSONP';

        var dcSearch = dcUrl + docId + searchUrl + queryO.querystring + cbUrl;
        
        return $http({method: searchMethod, url: dcSearch }).
          success(function(data, status, headers, config) {   return data;     }).
          error(function(data, status, headers, config) {          });
      }

      function getCurPg( curDoc ) {

        var txtPage = curDoc.resources.page.text.replace('{page}', curDoc.curPage ),
          cbUrl = '?callback=JSON_CALLBACK', searchMethod = 'JSONP';

        return $http({method: searchMethod, url: txtPage + cbUrl, responseType: 'text'  }).
          success(function(data, status, headers, config) {  curDoc.curText = data; return data;     }).
          error(function(data, status, headers, config) {          });
      }

    }

})();