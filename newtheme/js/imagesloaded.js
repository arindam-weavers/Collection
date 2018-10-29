(function(e){"use strict";function i(e,t){for(var n in t){e[n]=t[n]}return e}function o(e){return s.call(e)==="[object Array]"}function u(e){var t=[];if(o(e)){t=e}else if(typeof e.length==="number"){for(var n=0,r=e.length;n<r;n++){t.push(e[n])}}else{t.push(e)}return t}function a(e,s){function o(e,n,r){if(!(this instanceof o)){return new o(e,n)}if(typeof e==="string"){e=document.querySelectorAll(e)}this.elements=u(e);this.options=i({},this.options);if(typeof n==="function"){r=n}else{i(this.options,n)}if(r){this.on("always",r)}this.getImages();if(t){this.jqDeferred=new t.Deferred}var s=this;setTimeout(function(){s.check()})}function f(e){this.img=e}o.prototype=new e;o.prototype.options={};o.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;e<t;e++){var n=this.elements[e];if(n.nodeName==="IMG"){this.addImage(n)}var r=n.querySelectorAll("img");for(var i=0,s=r.length;i<s;i++){var o=r[i];this.addImage(o)}}};o.prototype.addImage=function(e){var t=new f(e);this.images.push(t)};o.prototype.check=function(){function s(s,o){if(e.options.debug&&r){n.log("confirm",s,o)}e.progress(s);t++;if(t===i){e.complete()}return true}var e=this;var t=0;var i=this.images.length;this.hasAnyBroken=false;if(!i){this.complete();return}for(var o=0;o<i;o++){var u=this.images[o];u.on("confirm",s);u.check()}};o.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;this.emit("progress",this,e);if(this.jqDeferred){this.jqDeferred.notify(this,e)}};o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=true;this.emit(e,this);this.emit("always",this);if(this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}};if(t){t.fn.imagesLoaded=function(e,n){var r=new o(this,e,n);return r.jqDeferred.promise(t(this))}}var a={};f.prototype=new e;f.prototype.check=function(){var e=a[this.img.src];if(e){this.useCached(e);return}a[this.img.src]=this;if(this.img.complete&&this.img.naturalWidth!==undefined){this.confirm(this.img.naturalWidth!==0,"naturalWidth");return}var t=this.proxyImage=new Image;s.bind(t,"load",this);s.bind(t,"error",this);t.src=this.img.src};f.prototype.useCached=function(e){if(e.isConfirmed){this.confirm(e.isLoaded,"cached was confirmed")}else{var t=this;e.on("confirm",function(e){t.confirm(e.isLoaded,"cache emitted confirmed");return true})}};f.prototype.confirm=function(e,t){this.isConfirmed=true;this.isLoaded=e;this.emit("confirm",this,t)};f.prototype.handleEvent=function(e){var t="on"+e.type;if(this[t]){this[t](e)}};f.prototype.onload=function(){this.confirm(true,"onload");this.unbindProxyEvents()};f.prototype.onerror=function(){this.confirm(false,"onerror");this.unbindProxyEvents()};f.prototype.unbindProxyEvents=function(){s.unbind(this.proxyImage,"load",this);s.unbind(this.proxyImage,"error",this)};return o}var t=e.jQuery;var n=e.console;var r=typeof n!=="undefined";var s=Object.prototype.toString;if(typeof define==="function"&&define.amd){define(["eventEmitter","eventie"],a)}else{e.imagesLoaded=a(e.EventEmitter,e.eventie)}})(window)