!function(t){function n(r){if(e[r])return e[r].exports;var o=e[r]={exports:{},id:r,loaded:!1};return t[r].call(o.exports,o,o.exports,n),o.loaded=!0,o.exports}var e={};return n.m=t,n.c=e,n.p="dist/img/",n(0)}([function(t,n,e){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}var o=e(14),i=r(o),u=e(11),f=r(u),c=e(12),s=r(c),a=e(44),l=r(a);Vue.use(VueResource);new Vue((0,i["default"])({router:f["default"],store:s["default"]},l["default"])).$mount("#app")},function(t,n,e){t.exports=!e(2)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(t,n){t.exports=function(t){try{return!!t()}catch(n){return!0}}},function(t,n){var e=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=e)},function(t,n){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,n){var e=t.exports={version:"2.4.0"};"number"==typeof __e&&(__e=e)},function(t,n){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on  "+t);return t}},function(t,n,e){var r=e(19);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==r(t)?t.split(""):Object(t)}},function(t,n){var e=Math.ceil,r=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?r:e)(t)}},function(t,n,e){var r=e(7),o=e(6);t.exports=function(t){return r(o(t))}},function(t,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),Vue.http.options.root="http://"+window.location.host,Vue.http.headers.common["X-CSRF-TOKEN"]=document.getElementById("_token").getAttribute("content"),n["default"]={created:function(){var t=1==document.getElementById("_auth").getAttribute("content");this.$store.dispatch("setLogin",{bool:t})},mounted:function(){console.log(this.$store.getters.getLogin),this.$http.get("/api/user").then(function(t){console.log(t)},function(t){})}}},function(t,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),Vue.use(VueRouter);var e={template:"<div>foo</div>"},r={template:"<div>bar</div>"};n["default"]=new VueRouter({mode:"history",routes:[{path:"/foo",components:e},{path:"/bar",components:r}]})},function(t,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n["default"]=new Vuex.Store({state:{login:!1,socket:null,qiniuToken:""},mutations:{SET_LOGIN:function(t,n){var e=n.bool;t.login=e},INIT_SOCKET:function(t,n){t.socket=n},SET_QINIU_TOKEN:function(t,n){t.qiniuToken=n}},actions:{setLogin:function(t,n){var e=t.commit,r=n.bool;e("SET_LOGIN",{bool:r})}},getters:{getLogin:function(t){return t.login}}})},function(t,n,e){t.exports={"default":e(15),__esModule:!0}},function(t,n,e){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}n.__esModule=!0;var o=e(13),i=r(o);n["default"]=i["default"]||function(t){for(var n=1;n<arguments.length;n++){var e=arguments[n];for(var r in e)Object.prototype.hasOwnProperty.call(e,r)&&(t[r]=e[r])}return t}},function(t,n,e){e(41),t.exports=e(5).Object.assign},function(t,n){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,n,e){var r=e(4);t.exports=function(t){if(!r(t))throw TypeError(t+" is not an object!");return t}},function(t,n,e){var r=e(9),o=e(37),i=e(36);t.exports=function(t){return function(n,e,u){var f,c=r(n),s=o(c.length),a=i(u,s);if(t&&e!=e){for(;s>a;)if(f=c[a++],f!=f)return!0}else for(;s>a;a++)if((t||a in c)&&c[a]===e)return t||a||0;return!t&&-1}}},function(t,n){var e={}.toString;t.exports=function(t){return e.call(t).slice(8,-1)}},function(t,n,e){var r=e(16);t.exports=function(t,n,e){if(r(t),void 0===n)return t;switch(e){case 1:return function(e){return t.call(n,e)};case 2:return function(e,r){return t.call(n,e,r)};case 3:return function(e,r,o){return t.call(n,e,r,o)}}return function(){return t.apply(n,arguments)}}},function(t,n,e){var r=e(4),o=e(3).document,i=r(o)&&r(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},function(t,n){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,n,e){var r=e(3),o=e(5),i=e(20),u=e(25),f="prototype",c=function(t,n,e){var s,a,l,p=t&c.F,d=t&c.G,v=t&c.S,h=t&c.P,g=t&c.B,y=t&c.W,m=d?o:o[n]||(o[n]={}),b=m[f],x=d?r:v?r[n]:(r[n]||{})[f];d&&(e=n);for(s in e)a=!p&&x&&void 0!==x[s],a&&s in m||(l=a?x[s]:e[s],m[s]=d&&"function"!=typeof x[s]?e[s]:g&&a?i(l,r):y&&x[s]==l?function(t){var n=function(n,e,r){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(n);case 2:return new t(n,e)}return new t(n,e,r)}return t.apply(this,arguments)};return n[f]=t[f],n}(l):h&&"function"==typeof l?i(Function.call,l):l,h&&((m.virtual||(m.virtual={}))[s]=l,t&c.R&&b&&!b[s]&&u(b,s,l)))};c.F=1,c.G=2,c.S=4,c.P=8,c.B=16,c.W=32,c.U=64,c.R=128,t.exports=c},function(t,n){var e={}.hasOwnProperty;t.exports=function(t,n){return e.call(t,n)}},function(t,n,e){var r=e(28),o=e(33);t.exports=e(1)?function(t,n,e){return r.f(t,n,o(1,e))}:function(t,n,e){return t[n]=e,t}},function(t,n,e){t.exports=!e(1)&&!e(2)(function(){return 7!=Object.defineProperty(e(21)("div"),"a",{get:function(){return 7}}).a})},function(t,n,e){"use strict";var r=e(31),o=e(29),i=e(32),u=e(38),f=e(7),c=Object.assign;t.exports=!c||e(2)(function(){var t={},n={},e=Symbol(),r="abcdefghijklmnopqrst";return t[e]=7,r.split("").forEach(function(t){n[t]=t}),7!=c({},t)[e]||Object.keys(c({},n)).join("")!=r})?function(t,n){for(var e=u(t),c=arguments.length,s=1,a=o.f,l=i.f;c>s;)for(var p,d=f(arguments[s++]),v=a?r(d).concat(a(d)):r(d),h=v.length,g=0;h>g;)l.call(d,p=v[g++])&&(e[p]=d[p]);return e}:c},function(t,n,e){var r=e(17),o=e(26),i=e(39),u=Object.defineProperty;n.f=e(1)?Object.defineProperty:function(t,n,e){if(r(t),n=i(n,!0),r(e),o)try{return u(t,n,e)}catch(f){}if("get"in e||"set"in e)throw TypeError("Accessors not supported!");return"value"in e&&(t[n]=e.value),t}},function(t,n){n.f=Object.getOwnPropertySymbols},function(t,n,e){var r=e(24),o=e(9),i=e(18)(!1),u=e(34)("IE_PROTO");t.exports=function(t,n){var e,f=o(t),c=0,s=[];for(e in f)e!=u&&r(f,e)&&s.push(e);for(;n.length>c;)r(f,e=n[c++])&&(~i(s,e)||s.push(e));return s}},function(t,n,e){var r=e(30),o=e(22);t.exports=Object.keys||function(t){return r(t,o)}},function(t,n){n.f={}.propertyIsEnumerable},function(t,n){t.exports=function(t,n){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:n}}},function(t,n,e){var r=e(35)("keys"),o=e(40);t.exports=function(t){return r[t]||(r[t]=o(t))}},function(t,n,e){var r=e(3),o="__core-js_shared__",i=r[o]||(r[o]={});t.exports=function(t){return i[t]||(i[t]={})}},function(t,n,e){var r=e(8),o=Math.max,i=Math.min;t.exports=function(t,n){return t=r(t),t<0?o(t+n,0):i(t,n)}},function(t,n,e){var r=e(8),o=Math.min;t.exports=function(t){return t>0?o(r(t),9007199254740991):0}},function(t,n,e){var r=e(6);t.exports=function(t){return Object(r(t))}},function(t,n,e){var r=e(4);t.exports=function(t,n){if(!r(t))return t;var e,o;if(n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;if("function"==typeof(e=t.valueOf)&&!r(o=e.call(t)))return o;if(!n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},function(t,n){var e=0,r=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++e+r).toString(36))}},function(t,n,e){var r=e(23);r(r.S+r.F,"Object",{assign:e(27)})},function(t,n,e){n=t.exports=e(43)(),n.push([t.id,"",""])},function(t,n){t.exports=function(){var t=[];return t.toString=function(){for(var t=[],n=0;n<this.length;n++){var e=this[n];e[2]?t.push("@media "+e[2]+"{"+e[1]+"}"):t.push(e[1])}return t.join("")},t.i=function(n,e){"string"==typeof n&&(n=[[null,n,""]]);for(var r={},o=0;o<this.length;o++){var i=this[o][0];"number"==typeof i&&(r[i]=!0)}for(o=0;o<n.length;o++){var u=n[o];"number"==typeof u[0]&&r[u[0]]||(e&&!u[2]?u[2]=e:e&&(u[2]="("+u[2]+") and ("+e+")"),t.push(u))}},t}},function(t,n,e){var r,o;e(47),r=e(10);var i=e(45);o=r=r||{},"object"!=typeof r["default"]&&"function"!=typeof r["default"]||(o=r=r["default"]),"function"==typeof o&&(o=o.options),o.render=i.render,o.staticRenderFns=i.staticRenderFns,o._scopeId="data-v-1",t.exports=r},function(module,exports){module.exports={render:function(){with(this)return _h("div",[_m(0)," ",_h("p",[_h("router-link",{attrs:{to:"/foo"}},["Go to Foo"])," ",_h("router-link",{attrs:{to:"/bar"}},["Go to Bar"])])," ",_h("router-view")])},staticRenderFns:[function(){with(this)return _h("h1",["Hello App!"])}]}},function(t,n,e){function r(t,n){for(var e=0;e<t.length;e++){var r=t[e],o=l[r.id];if(o){o.refs++;for(var i=0;i<o.parts.length;i++)o.parts[i](r.parts[i]);for(;i<r.parts.length;i++)o.parts.push(c(r.parts[i],n))}else{for(var u=[],i=0;i<r.parts.length;i++)u.push(c(r.parts[i],n));l[r.id]={id:r.id,refs:1,parts:u}}}}function o(t){for(var n=[],e={},r=0;r<t.length;r++){var o=t[r],i=o[0],u=o[1],f=o[2],c=o[3],s={css:u,media:f,sourceMap:c};e[i]?e[i].parts.push(s):n.push(e[i]={id:i,parts:[s]})}return n}function i(t,n){var e=v(),r=y[y.length-1];if("top"===t.insertAt)r?r.nextSibling?e.insertBefore(n,r.nextSibling):e.appendChild(n):e.insertBefore(n,e.firstChild),y.push(n);else{if("bottom"!==t.insertAt)throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");e.appendChild(n)}}function u(t){t.parentNode.removeChild(t);var n=y.indexOf(t);n>=0&&y.splice(n,1)}function f(t){var n=document.createElement("style");return n.type="text/css",i(t,n),n}function c(t,n){var e,r,o;if(n.singleton){var i=g++;e=h||(h=f(n)),r=s.bind(null,e,i,!1),o=s.bind(null,e,i,!0)}else e=f(n),r=a.bind(null,e),o=function(){u(e)};return r(t),function(n){if(n){if(n.css===t.css&&n.media===t.media&&n.sourceMap===t.sourceMap)return;r(t=n)}else o()}}function s(t,n,e,r){var o=e?"":r.css;if(t.styleSheet)t.styleSheet.cssText=m(n,o);else{var i=document.createTextNode(o),u=t.childNodes;u[n]&&t.removeChild(u[n]),u.length?t.insertBefore(i,u[n]):t.appendChild(i)}}function a(t,n){var e=n.css,r=n.media,o=n.sourceMap;if(r&&t.setAttribute("media",r),o&&(e+="\n/*# sourceURL="+o.sources[0]+" */",e+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(o))))+" */"),t.styleSheet)t.styleSheet.cssText=e;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(e))}}var l={},p=function(t){var n;return function(){return"undefined"==typeof n&&(n=t.apply(this,arguments)),n}},d=p(function(){return/msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase())}),v=p(function(){return document.head||document.getElementsByTagName("head")[0]}),h=null,g=0,y=[];t.exports=function(t,n){n=n||{},"undefined"==typeof n.singleton&&(n.singleton=d()),"undefined"==typeof n.insertAt&&(n.insertAt="bottom");var e=o(t);return r(e,n),function(t){for(var i=[],u=0;u<e.length;u++){var f=e[u],c=l[f.id];c.refs--,i.push(c)}if(t){var s=o(t);r(s,n)}for(var u=0;u<i.length;u++){var c=i[u];if(0===c.refs){for(var a=0;a<c.parts.length;a++)c.parts[a]();delete l[c.id]}}}};var m=function(){var t=[];return function(n,e){return t[n]=e,t.filter(Boolean).join("\n")}}()},function(t,n,e){var r=e(42);"string"==typeof r&&(r=[[t.id,r,""]]);e(46)(r,{});r.locals&&(t.exports=r.locals)}]);