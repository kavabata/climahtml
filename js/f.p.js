!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var t;t="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,t.jqueryFusioncharts=e()}}(function(){return function e(t,n,r){function o(i,s){if(!n[i]){if(!t[i]){var l="function"==typeof require&&require;if(!s&&l)return l(i,!0);if(a)return a(i,!0);var d=new Error("Cannot find module '"+i+"'");throw d.code="MODULE_NOT_FOUND",d}var u=n[i]={exports:{}};t[i][0].call(u.exports,function(e){var n=t[i][1][e];return o(n?n:e)},u,u.exports,e,t,n,r)}return n[i].exports}for(var a="function"==typeof require&&require,i=0;i<r.length;i++)o(r[i]);return o}({1:[function(e,t,n){(function(n){var r="undefined"!=typeof window?window.FusionCharts:void 0!==n?n.FusionCharts:null,o="undefined"!=typeof window?window.$:void 0!==n?n.$:null;e("./transcoder-htmltable/transcoder-htmltable"),r.register("module",["private","extensions.jQueryPlugin",function(){var e,t,n,a,i=this,s=i.window,l=i.hcLib,d=s.document,u=o,f=s.Math,c=f.min,h=l.isArray,p={feed:"feedData",setdata:"setData",setdataforid:"setDataForId",getdata:"getData",getdataforid:"getDataForId",clear:"clearChart",stop:"stopUpdate",start:"restartUpdate"},g={feedData:function(e){return"string"==typeof e?[e]:!("object"!=typeof e||!e.stream)&&[e.stream]},getData:function(e){return isNaN(e)?"object"==typeof e&&e.index?[e.index]:[]:[e]},getDataForId:function(e){return"string"==typeof e?[e]:"object"==typeof e&&e.id?[e.id]:[]},setData:function(e,t,n){var r=[];return"object"!=typeof e?r=[e,t,n]:(e.value&&r.push(e.value),e.label&&r.push(e.label)),r},setDataForId:function(e,t,n){var r=[];return"string"==typeof e||"string"==typeof t||"string"==typeof n?r=[e,t,n]:"object"==typeof e&&(e.value&&r.push(e.value),e.label&&r.push(e.label)),r},clearChart:function(e){return[e]},stopUpdate:function(e){return[e]},restartUpdate:function(e){return[e]}};u.FusionCharts=i.core,e=function(e,t){var n,o,a,l,f;for(o=h(t)||t instanceof u?c(e.length,t.length):e.length,n=0;n<o;n+=1)a=h(t)||t instanceof u?t[n]:t,e[n].parentNode?i.core.render(u.extend({},a,{renderAt:e[n]})):(l=new r(u.extend({},a,{renderAt:e[n]})),u.FusionCharts.delayedRender||(u.FusionCharts.delayedRender={}),u.FusionCharts.delayedRender[l.id]=e[n],f=d.createElement("script"),f.setAttribute("type","text/javascript"),/msie/i.test(s.navigator.userAgent)&&!s.opera?f.text="FusionCharts.items['"+l.id+"'].render();":f.appendChild(d.createTextNode("FusionCharts.items['"+l.id+"'].render()")),e[n].appendChild(f));return e},t=function(e,t){var n;u.extend(e,u.Event("fusioncharts"+e.eventType)),e.sender&&e.sender.options?(n=e.sender.options.containerElement||e.sender.options.containerElementId,"object"==typeof n?u(n).trigger(e,t):u("#"+n).length?u("#"+n).trigger(e,t):u(d).trigger(e,t)):u(d).trigger(e,t)},i.addEventListener("*",t),n=function(e){return e.filter(":FusionCharts").add(e.find(":FusionCharts"))},a=function(e,t,n){"object"==typeof t&&e.each(function(){this.configureLink(t,n)})},u.fn.insertFusionCharts=function(t){return e(this,t)},u.fn.appendFusionCharts=function(t){return t.insertMode="append",e(this,t)},u.fn.prependFusionCharts=function(t){return t.insertMode="prepend",e(this,t)},u.fn.attrFusionCharts=function(e,t){var r=[],o=n(this);return void 0!==t?(o.each(function(){this.FusionCharts.setChartAttribute(e,t)}),this):"object"==typeof e?(o.each(function(){this.FusionCharts.setChartAttribute(e)}),this):(o.each(function(){r.push(this.FusionCharts.getChartAttribute(e))}),r)},u.fn.updateFusionCharts=function(e){var t,r,o,a,i,s,l={},d=n(this),u=[["swfUrl",!1],["type",!1],["height",!1],["width",!1],["containerBackgroundColor",!0],["containerBackgroundAlpha",!0],["dataFormat",!1],["dataSource",!1]];for(t=0,r=u.length;t<r;t+=1)i=u[t][0],l.type=l.type||l.swfUrl,e[i]&&(u[t][1]&&(a=!0),l[i]=e[i]);return d.each(function(){if(o=this.FusionCharts,a)return s=o.clone(l),void s.render();void 0===l.dataSource&&void 0===l.dataFormat||(void 0===l.dataSource?o.setChartData(o.args.dataSource,l.dataFormat):void 0===l.dataFormat?o.setChartData(l.dataSource,o.args.dataFormat):o.setChartData(l.dataSource,l.dataFormat)),void 0===l.width&&void 0===l.height||o.resizeTo(l.width,l.height),l.type&&o.chartType(l.type)}),this},u.fn.cloneFusionCharts=function(e,t){var r,o,a;return"function"!=typeof e&&"function"==typeof t&&(o=e,e=t,t=o),r=[],a=n(this),a.each(function(){r.push(this.FusionCharts.clone(t,{},!0))}),e.call(u(r),r),this},u.fn.disposeFusionCharts=function(){return n(this).each(function(){this.FusionCharts.dispose(),delete this.FusionCharts,0===this._fcDrillDownLevel&&delete this._fcDrillDownLevel}),this},u.fn.convertToFusionCharts=function(e,t){var n=[];return void 0===e.dataConfiguration&&(e.dataConfiguration={}),u.extend(!0,e.dataConfiguration,t),e.dataSource||(e.dataSource=this.get(0)),e.renderAt?"string"==typeof e.renderAt?n.push(u("#"+e.renderAt).insertFusionCharts(e).get(0)):"object"==typeof e.renderAt&&n.push(u(e.renderAt).insertFusionCharts(e).get(0)):this.each(function(){n.push(u("<div></div>").insertBefore(this).insertFusionCharts(e).get(0))}),u(n)},u.fn.drillDownFusionChartsTo=function(){var e,t,r,o,i,s=n(this);for(void 0===this._fcDrillDownLevel&&(this._fcDrillDownLevel=0),e=0,t=arguments.length;e<t;e+=1)if(i=arguments[e],h(i))for(r=0,o=i.length;r<o;r+=1)a(s,i[r],this._fcDrillDownLevel),this._fcDrillDownLevel+=1;else a(s,i,this._fcDrillDownLevel),this._fcDrillDownLevel+=1;return this},u.fn.streamFusionChartsData=function(e,t,r,o){var a,i,s,l=n(this),d=[];if(void 0===(i=p[e&&e.toLowerCase()])){if(1!==arguments.length)return this;s=[e],i=p.feed}else s=1===arguments.length?[]:g[i](t,r,o);return"getData"===i||"getDataForId"===i?(l.each(function(){a=this.FusionCharts,"function"==typeof a[i]&&d.push(a[i].apply(a,s))}),d):(l.each(function(){a=this.FusionCharts,"function"==typeof a[i]&&a[i].apply(a,s)}),this)},u.extend(u.expr[":"],{FusionCharts:function(e){return e.FusionCharts instanceof i.core}})}]),t.exports=r}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"./transcoder-htmltable/transcoder-htmltable":2}],2:[function(e,t,n){(function(e){var n="undefined"!=typeof window?window.FusionCharts:void 0!==e?e.FusionCharts:null;n.register("module",["private","HTMLTableDataHandler",function(){var e=this,t=e.window,n=t.document,r=function(e){var t,n,r=[];for(n=0,t=e.length;n<t;n+=1)3!==e[n].nodeType&&r.push(e[n]);return r},o=function(e){var t=r(e.childNodes);if(t.length){if("TBODY"===t[0].nodeName)return t[0];if("THEAD"===t[0].nodeName&&t[1]&&"TBODY"===t[1].nodeName)return t[1]}return e},a=function(e){var t=r(e.childNodes);return t.length&&"THEAD"===t[0].nodeName&&t[1]&&"TBODY"===t[1].nodeName?t[0].childNodes:[]},i=function(e){return void 0!==e.innerText?e.innerText:e.textContent},s=function(e){var t,n,o,a,i,s,l,d=1,u={},f=[];for(t=0,o=e.length;t<o;t+=1)for(i=r(e[t].childNodes),d=1,s=0,n=0,a=i.length;n<a;n+=1){for(l=n+d+s-1,u[l]&&t-u[l].rowNum<u[l].row&&(s+=u[l].col,l+=u[l].col),parseInt(i[n].getAttribute("rowspan"),10)>1&&(u[l]||(u[l]={}),u[l].rowNum=t,u[l].row=parseInt(i[n].getAttribute("rowspan"),10),parseInt(i[n].getAttribute("colspan"),10)>1?u[l].col=parseInt(i[n].getAttribute("colspan"),10):u[l].col=1);f.length<=l;)f.push({childNodes:[]});f[l].childNodes.push(i[n]),parseInt(i[n].getAttribute("colspan"),10)>1&&(d+=parseInt(i[n].getAttribute("colspan"),10)-1)}return f},l=function(e,t){for(var n=e.length;n;)if(n-=1,e[n]===t)return!0;return!1},d=function(e,t,n){var o,a,s,l=r(e[t].childNodes);for(o=0,a=l.length;o<a;o+=1)if(o!==n&&(s=i(l[o]),parseFloat(s)===s))return!0;return!1},u=0,f=function(e,t,n,o){var a,c,h,p,g,b,w,v,y,C,F,m=null,x=[],D=[],L=0,T={},_=0,j=0;if(void 0===n){for(g=r(e[0].childNodes),p=0,a=g.length;p<a;p+=1)if(w=p+_,x[w]="__fcBLANK__"+(w+1),b=parseInt(g[p].colSpan,10),(b=b>1?b:parseInt(g[p].rowSpan,10))>1){for(c=1;c<b;c+=1)x[w+c]="__fcBLANK__"+(w+c+1);_+=b-1}for(h=0,c=p+_,a=t.length;h<a;h+=1)t[h]>0?delete x[t[h]-1]:delete x[c+t[h]];return{index:-1,labelObj:x}}if(0===n){for(h=0,c=e.length;h<c;h+=1){if(g=r(e[h].childNodes),D[h]=0,L=0,o&&o._extractByHeaderTag){for(p=0,a=g.length;p<a;p+=1)if("th"==g[p].nodeName.toLowerCase())return F=f(e,t,h+1),delete F.labelObj[o._rowLabelIndex],F}else for(p=0,a=g.length;p<a;p+=1)if(!l(t,p+1)&&!l(t,p-a))if(b=i(g[p]),""!==b.replace(/^\s*/,"").replace(/\s*$/,"")){if(parseFloat(b)!=b&&(L+=1)>1)return f(e,t,h+1)}else D[h]+=1;h>0&&(D[h-1]>D[h]?m=h-1:D[h-1]<D[h]&&(m=h))}return null!==m?f(e,t,m+1):f(e,t)}for(n<0?n+=e.length:n>0&&(n-=1),g=r(e[n].childNodes),v=void 0!==e[0].nodeType,p=0,a=g.length;p<a;p+=1)if(C=0,v?"1"!==g[p].colSpan&&(C=parseInt(g[p].colSpan,10)):"1"!==g[p].rowSpan&&(C=parseInt(g[p].rowSpan,10)),C=C>1?C:0,b=i(g[p]),""!==b.replace(/^\s*/,"").replace(/\s*$/,"")?T[p+j]=b:d(s(e),p,n)&&(T[p+j]="__fcBLANK__"+u,u+=1),C>1){for(b=T[p+j],h=1;h<C;h+=1)T[p+j+h]=b+" ("+h+")";j+=C-1}for(y=a+j,h=0,a=t.length;h<a;h+=1)t[h]>0?delete T[t[h]-1]:delete T[y+t[h]];return{labelObj:T,index:n}},c=function(e,l){if("string"==typeof e&&(e=n.getElementById(e)),void 0!==t.jQuery&&e instanceof t.jQuery&&(e=e.get(0)),!e)return{data:null};l.hideTable&&(e.style.display="none");var d,u,c,h,p,g,b,w,v,y,C,F,m,x,D={},L={},T={},_=r(a(e)).concat(r(o(e).childNodes)),j=_.length,N=0,A=0,O=0,S=0,I=!1,B=l.chartType;if(["column2d","column3d","pie3d","pie2d","line","bar2d","area2d","doughnut2d","doughnut3d","pareto2d","pareto3d"].indexOf(B)!==-1&&(I=!0),l.rowLabelSource=parseInt(l.labelSource,10),l.colLabelSource=parseInt(l.legendSource,10),"column"===l.major?(C=l.useLabels?f(_,l.ignoreCols,l.rowLabelSource):f(_,l.ignoreCols),m=l.useLegend?f(s(_),l.ignoreRows,l.colLabelSource):f(s(_),l.ignoreRows)):(x=f(s(_),l.ignoreRows,l.rowLabelSource),C=l.useLabels?x:f(s(_),l.ignoreRows),l._rowLabelIndex=x.index,l._extractByHeaderTag=!0,m=l.useLegend?f(_,l.ignoreCols,l.colLabelSource,l):f(_,l.ignoreCols),delete l._extractByHeaderTag,x=C,C=m,m=x),delete C.labelObj[m.index],delete m.labelObj[C.index],"row"===l.major)for(w in m.labelObj)D[w]={};else for(w in C.labelObj)D[w]={};for(d=0;d<j;d+=1)if(C.index!==d&&void 0!==m.labelObj[d]){for(N+=1,c=r(_[d].childNodes),L[d]=0,T[d]={},u=0,b=c.length;u<b;u+=1){for(y=c[u],g=parseInt(y.getAttribute("colspan"),10),v=parseInt(y.getAttribute("rowspan"),10),p=u+L[d];S<d;){if(T[S])for(F in T[S]){if(F>p)break;d-S<=T[S][F].row&&(p+=T[S][F].col)}S+=1}if(g>1&&(L[d]+=g-1),v>1&&(T[d][p]=g>1?{row:v-1,col:g}:{row:v-1,col:1}),m.index!==p&&void 0!==C.labelObj[p]){if(O+=1,h=i(y),""===h.replace(/^\s*/,"").replace(/\s*$/,"")){if(!l.convertBlankTo)continue;h=l.convertBlankTo}if(g=g>1?g:1,v=v>1?v:1,"row"===l.major)for(S=0;S<g;){for(F=0;F<v;)D[d+F][p+S]=parseFloat(h),F+=1;S+=1}else for(S=0;S<g;){for(F=0;F<v;)D[p+S][d+F]=parseFloat(h),F+=1;S+=1}}}O>A&&(A=O)}return{data:D,chartType:B?I?"single":"multi":N>1&&A>1?"multi":"single",labelMap:m,legendMap:C}},h=function(t,n,r){var o,a,i,s,l,d,u,f,h,p={chartAttributes:{},major:"row",useLabels:!0,useLegend:!0,labelSource:0,legendSource:0,ignoreCols:[],ignoreRows:[],showLabels:!0,showLegend:!0,seriesColors:[],convertBlankTo:"0",hideTable:!1,chartType:n.chartType&&n.chartType(),labels:[],legend:[],data:[]},g={},b={};if(e.extend(p,r),d=c(t,p),u=d.data,"row"!==p.major?(f=d.legendMap,h=d.labelMap):(f=d.labelMap,h=d.legendMap),g.chart=e.extend({},p.chartAttributes),"multi"===d.chartType){g.categories=[{category:[]}],g.dataset=[],s=g.categories[0].category,l=g.dataset,o=0;for(a in u){p.showLabels===!0?s.push(e.extend({label:f.labelObj[a].indexOf("__fcBLANK__")!=-1?"":f.labelObj[a]},p.labels[o])):s.push({label:""}),o+=1;for(i in u[a])void 0===b[i]&&(b[i]=[]),b[i].push({value:u[a][i]})}o=0;for(a in b)p.showLegend===!0?l.push(e.extend({seriesname:h.labelObj[a].indexOf("__fcBLANK__")!==-1?"":h.labelObj[a],data:b[a]},p.legend[o])):l.push({seriesname:"",data:b[a]}),o+=1}else if("single"===d.chartType)if(g.data=[],l=g.data,o=0,p.showLabels)for(a in u)for(i in u[a])l.push(e.extend({label:f.labelObj[a].indexOf("__fcBLANK__")!==-1?"":f.labelObj[a],value:u[a][i]},p.labels[o])),o+=1;else for(a in u)for(i in u[a])l.push({value:u[a][i]});return{data:e.core.transcodeData(g,"JSON","XML"),error:void 0}};e.addDataHandler("HTMLTable",{encode:function(e,t,n){return h(e,t,n)},decode:function(t,n){throw e.raiseError(n,"07101734","run","::HTMLTableDataHandler.decode()","FusionCharts HTMLTable data-handler only supports decoding of data."),new Error("FeatureNotSupportedException()")},transportable:!1})}]),t.exports=n}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}]},{},[1])(1)});