<?php
  /**
  * Fædrelandsvennen Åpenhetsportal ("Sørlandsporten")
  * version: 3
  * page: stats javascript fragment
  * info: Google Analytics and TNS
  * var: $pgPath - TNS pagepath var
  */
  $pgPath = "sorlandsporten";
?>
   <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','__fvnT');
    var fvn = fvn || {};

    fvn.opts = { 'cookieDomain': 'fvn.no', 'legacyCookieDomain': 'fvn.no'};
    __fvnT('create', 'UA-36122261-1', fvn.opts );
    __fvnT('set', 'anonymizeIp', true);

    fvn.dim2= 'info'; 
    __fvnT('set', 'dimension2', fvn.dim2);
    __fvnT('set', 'contentGroup1', fvn.dim2);
    __fvnT( 'send', 'pageview');
  </script>  

  <div id="tns-universal">
    <script type="text/javascript" src="http://www.fvn.no/resources/js/mno/tns/unispring.js"></script>
    <script type="text/javascript">var u_tns ={'s': 'mno','cp': 'mno/fvn'+'/<?php echo $pgPath ?>/','url' : window.location.toString()};unispring.c(u_tns);</script>
    <noscript>&lt;img width="1" height="1" src="http://mno.tns-cs.net/j0=,,,;+,cp=mno/fvn/<?php echo $pgPath ?>/+URL=noscript;;;" alt="" /&gt;</noscript>
  </div>