
 window.HFCHAT_CONFIG = {
     EMBED_TOKEN: "4e1eea60-b4d9-11e5-8a41-5780efc641ce",
     ACCESS_TOKEN: "44538635b7464869b75e340a9df5ba73",
     HOST_URL: "https://happyfoxchat.com",
     ASSETS_URL: "https://d1l7z5ofrj6ab8.cloudfront.net/visitor"
 };

(function() {
  var scriptTag = document.createElement('script');
  scriptTag.type = 'text/javascript';
  scriptTag.async = true;
  scriptTag.src = window.HFCHAT_CONFIG.ASSETS_URL + '/js/widget-loader.js';

  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(scriptTag, s);
})();
