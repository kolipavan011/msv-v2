import{s as Ge,o as m,c as v,b as u,l as G,q as We,Z as Qe,m as Ze,n as et,O as tt,r as rt,a as nt,d as st,v as at,F as ot,h as it,t as re,e as H,w as ne}from"./app-ISzOvFh-.js";import{L as ut}from"./AuthenticatedLayout-MJyUvD7w.js";import{_ as xe}from"./_plugin-vue_export-helper-x3n3nnut.js";var Te={},T={},Q={exports:{}},ke=function(e,r){return function(){for(var n=new Array(arguments.length),a=0;a<n.length;a++)n[a]=arguments[a];return e.apply(r,n)}};/*!
 * Determine if an object is a Buffer
 *
 * @author   Feross Aboukhadijeh <https://feross.org>
 * @license  MIT
 */var ct=function(e){return e!=null&&e.constructor!=null&&typeof e.constructor.isBuffer=="function"&&e.constructor.isBuffer(e)},lt=ke,dt=ct,E=Object.prototype.toString;function Le(t){return E.call(t)==="[object Array]"}function ht(t){return E.call(t)==="[object ArrayBuffer]"}function pt(t){return typeof FormData<"u"&&t instanceof FormData}function ft(t){var e;return typeof ArrayBuffer<"u"&&ArrayBuffer.isView?e=ArrayBuffer.isView(t):e=t&&t.buffer&&t.buffer instanceof ArrayBuffer,e}function mt(t){return typeof t=="string"}function vt(t){return typeof t=="number"}function _t(t){return typeof t>"u"}function Ae(t){return t!==null&&typeof t=="object"}function yt(t){return E.call(t)==="[object Date]"}function gt(t){return E.call(t)==="[object File]"}function wt(t){return E.call(t)==="[object Blob]"}function Pe(t){return E.call(t)==="[object Function]"}function bt(t){return Ae(t)&&Pe(t.pipe)}function Rt(t){return typeof URLSearchParams<"u"&&t instanceof URLSearchParams}function Et(t){return t.replace(/^\s*/,"").replace(/\s*$/,"")}function Ct(){return typeof navigator<"u"&&navigator.product==="ReactNative"?!1:typeof window<"u"&&typeof document<"u"}function Z(t,e){if(!(t===null||typeof t>"u"))if(typeof t!="object"&&(t=[t]),Le(t))for(var r=0,s=t.length;r<s;r++)e.call(null,t[r],r,t);else for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&e.call(null,t[n],n,t)}function qe(){var t={};function e(n,a){typeof t[a]=="object"&&typeof n=="object"?t[a]=qe(t[a],n):t[a]=n}for(var r=0,s=arguments.length;r<s;r++)Z(arguments[r],e);return t}function St(t,e,r){return Z(e,function(n,a){r&&typeof n=="function"?t[a]=lt(n,r):t[a]=n}),t}var f={isArray:Le,isArrayBuffer:ht,isBuffer:dt,isFormData:pt,isArrayBufferView:ft,isString:mt,isNumber:vt,isObject:Ae,isUndefined:_t,isDate:yt,isFile:gt,isBlob:wt,isFunction:Pe,isStream:bt,isURLSearchParams:Rt,isStandardBrowserEnv:Ct,forEach:Z,merge:qe,extend:St,trim:Et},xt=f,Tt=function(e,r){xt.forEach(e,function(n,a){a!==r&&a.toUpperCase()===r.toUpperCase()&&(e[r]=n,delete e[a])})},O,se;function kt(){return se||(se=1,O=function(e,r,s,n,a){return e.config=r,s&&(e.code=s),e.request=n,e.response=a,e}),O}var N,ae;function Ue(){if(ae)return N;ae=1;var t=kt();return N=function(r,s,n,a,i){var o=new Error(r);return t(o,s,n,a,i)},N}var B,oe;function Lt(){if(oe)return B;oe=1;var t=Ue();return B=function(r,s,n){var a=n.config.validateStatus;!n.status||!a||a(n.status)?r(n):s(t("Request failed with status code "+n.status,n.config,null,n.request,n))},B}var I,ie;function At(){if(ie)return I;ie=1;var t=f;function e(r){return encodeURIComponent(r).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}return I=function(s,n,a){if(!n)return s;var i;if(a)i=a(n);else if(t.isURLSearchParams(n))i=n.toString();else{var o=[];t.forEach(n,function(l,g){l===null||typeof l>"u"||(t.isArray(l)?g=g+"[]":l=[l],t.forEach(l,function(h){t.isDate(h)?h=h.toISOString():t.isObject(h)&&(h=JSON.stringify(h)),o.push(e(g)+"="+e(h))}))}),i=o.join("&")}return i&&(s+=(s.indexOf("?")===-1?"?":"&")+i),s},I}var $,ue;function Pt(){if(ue)return $;ue=1;var t=f,e=["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"];return $=function(s){var n={},a,i,o;return s&&t.forEach(s.split(`
`),function(l){if(o=l.indexOf(":"),a=t.trim(l.substr(0,o)).toLowerCase(),i=t.trim(l.substr(o+1)),a){if(n[a]&&e.indexOf(a)>=0)return;a==="set-cookie"?n[a]=(n[a]?n[a]:[]).concat([i]):n[a]=n[a]?n[a]+", "+i:i}}),n},$}var M,ce;function qt(){if(ce)return M;ce=1;var t=f;return M=t.isStandardBrowserEnv()?function(){var r=/(msie|trident)/i.test(navigator.userAgent),s=document.createElement("a"),n;function a(i){var o=i;return r&&(s.setAttribute("href",o),o=s.href),s.setAttribute("href",o),{href:s.href,protocol:s.protocol?s.protocol.replace(/:$/,""):"",host:s.host,search:s.search?s.search.replace(/^\?/,""):"",hash:s.hash?s.hash.replace(/^#/,""):"",hostname:s.hostname,port:s.port,pathname:s.pathname.charAt(0)==="/"?s.pathname:"/"+s.pathname}}return n=a(window.location.href),function(o){var y=t.isString(o)?a(o):o;return y.protocol===n.protocol&&y.host===n.host}}():function(){return function(){return!0}}(),M}var V,le;function Ut(){if(le)return V;le=1;var t=f;return V=t.isStandardBrowserEnv()?function(){return{write:function(s,n,a,i,o,y){var l=[];l.push(s+"="+encodeURIComponent(n)),t.isNumber(a)&&l.push("expires="+new Date(a).toGMTString()),t.isString(i)&&l.push("path="+i),t.isString(o)&&l.push("domain="+o),y===!0&&l.push("secure"),document.cookie=l.join("; ")},read:function(s){var n=document.cookie.match(new RegExp("(^|;\\s*)("+s+")=([^;]*)"));return n?decodeURIComponent(n[3]):null},remove:function(s){this.write(s,"",Date.now()-864e5)}}}():function(){return{write:function(){},read:function(){return null},remove:function(){}}}(),V}var j,de;function he(){if(de)return j;de=1;var t=f,e=Lt(),r=At(),s=Pt(),n=qt(),a=Ue();return j=function(o){return new Promise(function(l,g){var w=o.data,h=o.headers;t.isFormData(w)&&delete h["Content-Type"];var c=new XMLHttpRequest;if(o.auth){var ze=o.auth.username||"",Ye=o.auth.password||"";h.Authorization="Basic "+btoa(ze+":"+Ye)}if(c.open(o.method.toUpperCase(),r(o.url,o.params,o.paramsSerializer),!0),c.timeout=o.timeout,c.onreadystatechange=function(){if(!(!c||c.readyState!==4)&&!(c.status===0&&!(c.responseURL&&c.responseURL.indexOf("file:")===0))){var C="getAllResponseHeaders"in c?s(c.getAllResponseHeaders()):null,S=!o.responseType||o.responseType==="text"?c.responseText:c.response,Je={data:S,status:c.status,statusText:c.statusText,headers:C,config:o,request:c};e(l,g,Je),c=null}},c.onerror=function(){g(a("Network Error",o,null,c)),c=null},c.ontimeout=function(){g(a("timeout of "+o.timeout+"ms exceeded",o,"ECONNABORTED",c)),c=null},t.isStandardBrowserEnv()){var Xe=Ut(),te=(o.withCredentials||n(o.url))&&o.xsrfCookieName?Xe.read(o.xsrfCookieName):void 0;te&&(h[o.xsrfHeaderName]=te)}if("setRequestHeader"in c&&t.forEach(h,function(C,S){typeof w>"u"&&S.toLowerCase()==="content-type"?delete h[S]:c.setRequestHeader(S,C)}),o.withCredentials&&(c.withCredentials=!0),o.responseType)try{c.responseType=o.responseType}catch(b){if(o.responseType!=="json")throw b}typeof o.onDownloadProgress=="function"&&c.addEventListener("progress",o.onDownloadProgress),typeof o.onUploadProgress=="function"&&c.upload&&c.upload.addEventListener("progress",o.onUploadProgress),o.cancelToken&&o.cancelToken.promise.then(function(C){c&&(c.abort(),g(C),c=null)}),w===void 0&&(w=null),c.send(w)})},j}var d=f,Dt=Tt,Ht={"Content-Type":"application/x-www-form-urlencoded"};function pe(t,e){!d.isUndefined(t)&&d.isUndefined(t["Content-Type"])&&(t["Content-Type"]=e)}function Ot(){var t;return(typeof XMLHttpRequest<"u"||typeof process<"u")&&(t=he()),t}var k={adapter:Ot(),transformRequest:[function(e,r){return Dt(r,"Content-Type"),d.isFormData(e)||d.isArrayBuffer(e)||d.isBuffer(e)||d.isStream(e)||d.isFile(e)||d.isBlob(e)?e:d.isArrayBufferView(e)?e.buffer:d.isURLSearchParams(e)?(pe(r,"application/x-www-form-urlencoded;charset=utf-8"),e.toString()):d.isObject(e)?(pe(r,"application/json;charset=utf-8"),JSON.stringify(e)):e}],transformResponse:[function(e){if(typeof e=="string")try{e=JSON.parse(e)}catch{}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,validateStatus:function(e){return e>=200&&e<300}};k.headers={common:{Accept:"application/json, text/plain, */*"}};d.forEach(["delete","get","head"],function(e){k.headers[e]={}});d.forEach(["post","put","patch"],function(e){k.headers[e]=d.merge(Ht)});var ee=k,Nt=f;function L(){this.handlers=[]}L.prototype.use=function(e,r){return this.handlers.push({fulfilled:e,rejected:r}),this.handlers.length-1};L.prototype.eject=function(e){this.handlers[e]&&(this.handlers[e]=null)};L.prototype.forEach=function(e){Nt.forEach(this.handlers,function(s){s!==null&&e(s)})};var Bt=L,It=f,$t=function(e,r,s){return It.forEach(s,function(a){e=a(e,r)}),e},F,fe;function De(){return fe||(fe=1,F=function(e){return!!(e&&e.__CANCEL__)}),F}var Mt=function(e){return/^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)},Vt=function(e,r){return r?e.replace(/\/+$/,"")+"/"+r.replace(/^\/+/,""):e},me=f,K=$t,jt=De(),Ft=ee,Kt=Mt,zt=Vt;function z(t){t.cancelToken&&t.cancelToken.throwIfRequested()}var Yt=function(e){z(e),e.baseURL&&!Kt(e.url)&&(e.url=zt(e.baseURL,e.url)),e.headers=e.headers||{},e.data=K(e.data,e.headers,e.transformRequest),e.headers=me.merge(e.headers.common||{},e.headers[e.method]||{},e.headers||{}),me.forEach(["delete","get","head","post","put","patch","common"],function(n){delete e.headers[n]});var r=e.adapter||Ft.adapter;return r(e).then(function(n){return z(e),n.data=K(n.data,n.headers,e.transformResponse),n},function(n){return jt(n)||(z(e),n&&n.response&&(n.response.data=K(n.response.data,n.response.headers,e.transformResponse))),Promise.reject(n)})},Xt=ee,R=f,ve=Bt,Jt=Yt;function A(t){this.defaults=t,this.interceptors={request:new ve,response:new ve}}A.prototype.request=function(e){typeof e=="string"&&(e=R.merge({url:arguments[0]},arguments[1])),e=R.merge(Xt,{method:"get"},this.defaults,e),e.method=e.method.toLowerCase();var r=[Jt,void 0],s=Promise.resolve(e);for(this.interceptors.request.forEach(function(a){r.unshift(a.fulfilled,a.rejected)}),this.interceptors.response.forEach(function(a){r.push(a.fulfilled,a.rejected)});r.length;)s=s.then(r.shift(),r.shift());return s};R.forEach(["delete","get","head","options"],function(e){A.prototype[e]=function(r,s){return this.request(R.merge(s||{},{method:e,url:r}))}});R.forEach(["post","put","patch"],function(e){A.prototype[e]=function(r,s,n){return this.request(R.merge(n||{},{method:e,url:r,data:s}))}});var Gt=A,Y,_e;function He(){if(_e)return Y;_e=1;function t(e){this.message=e}return t.prototype.toString=function(){return"Cancel"+(this.message?": "+this.message:"")},t.prototype.__CANCEL__=!0,Y=t,Y}var X,ye;function Wt(){if(ye)return X;ye=1;var t=He();function e(r){if(typeof r!="function")throw new TypeError("executor must be a function.");var s;this.promise=new Promise(function(i){s=i});var n=this;r(function(i){n.reason||(n.reason=new t(i),s(n.reason))})}return e.prototype.throwIfRequested=function(){if(this.reason)throw this.reason},e.source=function(){var s,n=new e(function(i){s=i});return{token:n,cancel:s}},X=e,X}var J,ge;function Qt(){return ge||(ge=1,J=function(e){return function(s){return e.apply(null,s)}}),J}var W=f,Zt=ke,x=Gt,Oe=ee;function Ne(t){var e=new x(t),r=Zt(x.prototype.request,e);return W.extend(r,x.prototype,e),W.extend(r,e),r}var _=Ne(Oe);_.Axios=x;_.create=function(e){return Ne(W.merge(Oe,e))};_.Cancel=He();_.CancelToken=Wt();_.isCancel=De();_.all=function(e){return Promise.all(e)};_.spread=Qt();Q.exports=_;Q.exports.default=_;var er=Q.exports,P=er,p={};Object.defineProperty(p,"__esModule",{value:!0});p.SEARCH_ALL_URL="https://www.googleapis.com/youtube/v3/search";p.SEARCH_CHANNEL_URL="https://www.googleapis.com/youtube/v3/channels";p.SEARCH_PLAYLIST_URL="https://www.googleapis.com/youtube/v3/playlists";p.SEARCH_PLAYLIST_ITEMS_URL="https://www.googleapis.com/youtube/v3/playlistItems";p.SEARCH_VIDEO_URL="https://www.googleapis.com/youtube/v3/videos";p.SEARCH_COMMENTS_URL="https://www.googleapis.com/youtube/v3/comments";p.SEARCH_COMMENT_THREADS_URL="https://www.googleapis.com/youtube/v3/commentThreads";p.SEARCH_CHANNEL_SECTIONS_URL="https://www.googleapis.com/youtube/v3/channelSections";Object.defineProperty(T,"__esModule",{value:!0});const Be=P,Ie=p;function tr(t,e,r={}){return new Promise((s,n)=>{r.part="snippet,contentDetails",r.channelId=e,r.key=t,Be.default.get(Ie.SEARCH_CHANNEL_SECTIONS_URL,{params:r}).then(a=>{s(a.data)}).catch(a=>{n(a)})})}T.search_channel_sections=tr;function rr(t,e,r={}){return new Promise((s,n)=>{r.part="snippet,contentDetails,statistics",r.id=e,r.key=t,Be.default.get(Ie.SEARCH_CHANNEL_URL,{params:r}).then(a=>{s(a.data)}).catch(a=>{n(a)})})}T.search_channel=rr;var q={};Object.defineProperty(q,"__esModule",{value:!0});const $e=P,Me=p;function nr(t,e,r={}){return new Promise((s,n)=>{r.part="snippet,replies",r.videoId=e,r.key=t,$e.default.get(Me.SEARCH_COMMENT_THREADS_URL,{params:r}).then(a=>{s(a.data)}).catch(a=>{n(a)})})}q.search_comment_threads=nr;function sr(t,e,r={}){return new Promise((s,n)=>{r.part="snippet",r.parentId=e,r.key=t,$e.default.get(Me.SEARCH_COMMENTS_URL,{params:r}).then(a=>{s(a.data)}).catch(a=>{n(a)})})}q.search_comments=sr;var U={};Object.defineProperty(U,"__esModule",{value:!0});const Ve=P,je=p;function ar(t,e,r,s={}){return new Promise((n,a)=>{(r>50||r<0)&&a(new Error("maxResults should be between 0 and 50.")),s.part="snippet,contentDetails",s.channelId=e,s.maxResults=r,s.key=t,Ve.default.get(je.SEARCH_PLAYLIST_URL,{params:s}).then(i=>{n(i.data)}).catch(i=>{a(i)})})}U.search_playlist=ar;function or(t,e,r,s={}){return new Promise((n,a)=>{(r>50||r<0)&&a(new Error("maxResults should be between 0 and 50.")),s.part="snippet,contentDetails",s.playlistId=e,s.maxResults=r,s.key=t,Ve.default.get(je.SEARCH_PLAYLIST_ITEMS_URL,{params:s}).then(i=>{n(i.data)}).catch(i=>{a(i)})})}U.search_playlist_items=or;var D={};Object.defineProperty(D,"__esModule",{value:!0});const Fe=P,Ke=p;function ir(t,e,r,s={}){return new Promise((n,a)=>{(r>50||r<0)&&a(new Error("maxResults should be between 0 and 50.")),s.part="snippet",s.maxResults=r,s.q=e,s.key=t,Fe.default.get(Ke.SEARCH_ALL_URL,{params:s}).then(i=>{n(i.data)}).catch(i=>{a(i)})})}D.search_all=ir;function ur(t,e,r={}){return new Promise((s,n)=>{r.part="snippet,contentDetails,statistics",r.id=e,r.key=t,Fe.default.get(Ke.SEARCH_VIDEO_URL,{params:r}).then(a=>{s(a.data)}).catch(a=>{n(a)})})}D.search_video=ur;Object.defineProperty(Te,"__esModule",{value:!0});const we=T,be=q,Re=U,Ee=D;var cr=Te.YoutubeDataAPI=class{constructor(t){this.apiKey=t}searchAll(t,e,r={}){return Ee.search_all(this.apiKey,t,e,r)}searchVideo(t,e={}){return Ee.search_video(this.apiKey,t,e)}searchChannel(t,e={}){return we.search_channel(this.apiKey,t,e)}searchChannelSections(t,e={}){return we.search_channel_sections(this.apiKey,t,e)}searchComments(t,e={}){return be.search_comments(this.apiKey,t,e)}searchCommentThreads(t,e={}){return be.search_comment_threads(this.apiKey,t,e)}searchPlaylist(t,e,r={}){return Re.search_playlist(this.apiKey,t,e,r)}searchPlaylistItems(t,e,r={}){return Re.search_playlist_items(this.apiKey,t,e,r)}};const Ce=Ge("youtubePages",{state:()=>({pages:[]}),getters:{getPage(t){return e=>t.pages.filter(r=>r.pageToken===e)}},actions:{addPage(t){return this.pages.map(r=>r.pageToken).includes(t.pageToken)||this.pages.push(t),t},removePage(t){this.pages.map(r=>r.pageToken);let e=this.pages.indexOf(t);e>-1&&this.pages.splice(e,1)},pageExist(t){return this.pages.map(r=>r.pageToken).includes(t)},resetPages(){this.pages.length=0}}}),lr={props:{video:Object,keyword:String},data(){return{loading:!1,status:"bg-warning"}},methods:{downloadVideo(){this.loading=!0,this.request().post(route("video.create",{id:this.video.id}),{title:this.video.snippet.title,keyword:this.keyword}).then(t=>{this.loading=!1,this.status="bg-success"}).catch(t=>{this.loading=!1,this.status="bg-danger",console.log(t)})}}},dr={class:"modal-content"},hr={class:"modal-header"},pr={class:"modal-title",id:"staticBackdropLabel"},fr={class:"modal-body"},mr=["width","height","src"],vr={key:1,class:"container px-0 d-flex justify-content-center align-items-center",style:{height:"200px"}},_r=u("div",{class:"spinner-border text-primary",role:"status"},[u("span",{class:"visually-hidden"},"Loading...")],-1),yr=[_r],gr={class:"modal-footer"},wr=["disabled"],br=["disabled"];function Rr(t,e,r,s,n,a){return m(),v("div",dr,[u("div",hr,[u("h5",pr,[G(" Video Preview "),u("span",{class:We(["badge rounded-pill badge-sm",n.status])},"#",2)])]),u("div",fr,[n.loading?(m(),v("div",vr,yr)):(m(),v("img",{key:0,width:r.video.snippet.thumbnails.high.width,height:r.video.snippet.thumbnails.high.height,src:r.video.snippet.thumbnails.high.url,class:"w-100 rounded bg-secondary"},null,8,mr))]),u("div",gr,[u("button",{type:"button",class:"btn btn-secondary btn-sm","data-bs-dismiss":"modal",disabled:n.loading,onClick:e[0]||(e[0]=i=>t.$vbsModal.close())}," Close ",8,wr),u("button",{type:"button",class:"btn btn-primary btn-sm",onClick:e[1]||(e[1]=(...i)=>a.downloadVideo&&a.downloadVideo(...i)),disabled:n.loading}," Download ",8,br)])])}const Er=xe(lr,[["render",Rr]]),Se=new cr("AIzaSyBTX1j2o0wV9YC9c9VORGEC6LuQOyxiEgc"),Cr={layout:ut,props:{keyword:String,pageToken:String},components:{Head:Qe},data(){return{loading:!1,query:this.keyword.replaceAll("-"," "),nextToken:null,videos:[]}},computed:{...Ze(Ce,["getPage"])},methods:{...et(Ce,["addPage","removePage","pageExist","resetPages"]),fetchData(){if(this.query.length==0)return;let t=this.pageToken??"root";if(this.pageExist(t)){let r=this.getPage(t)[0];this.videos=r.items,this.nextToken=r.nextToken;return}this.loading=!0;let e={type:"video"};this.pageToken&&(e.pageToken=this.pageToken),Se.searchAll(this.query,50,e).then(({items:r,nextPageToken:s})=>(this.nextToken=s,Se.searchVideo(r.map(n=>n.id.videoId).toString()))).then(({items:r})=>{this.loading=!1,this.videos=r,this.addPage({pageToken:this.pageToken??"root",items:r,nextToken:this.nextToken})})},fetchPage(){this.resetPages(),this.nextToken=null,this.nextPage()},nextPage(){if(this.query.length==0)return;let t={q:this.query.replaceAll(" ","-")};this.nextToken&&(t.pageToken=this.nextToken),tt.get(route("vidbot"),t)},prevPage(){window.history.back()},openModal(t){this.$vbsModal.open({content:Er,contentProps:{video:t,keyword:this.query},staticBackdrop:!0})},formatDuration(t){return t.replace("PT","").replace("S","s").replace("M","m")}},mounted(){this.fetchData()}},Sr={class:"inertia-page"},xr=u("header",{class:"mb-4"},[u("div",{class:"d-flex justify-content-between mb-4 align-items-end"},[u("h3",{class:"mt-2"},"Vidbot")])],-1),Tr={class:"container px-0"},kr={class:"row mb-4"},Lr={class:"col-12"},Ar={class:"input-group"},Pr={class:"container px-0 mb-4"},qr={class:"row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4"},Ur={class:"col"},Dr={class:"card h-100"},Hr=["width","height","src"],Or={class:"card-tip"},Nr={class:"card-body"},Br={class:"card-title"},Ir=["onClick"],$r={key:0,class:"container px-0 d-flex justify-content-center align-items-center",style:{height:"300px"}},Mr=u("div",{class:"spinner-border text-primary",role:"status"},[u("span",{class:"visually-hidden"},"Loading...")],-1),Vr=[Mr],jr={"aria-label":"Page navigation example"},Fr={class:"pagination justify-content-center"},Kr={key:0,class:"page-item"},zr=u("span",{"aria-hidden":"true"},"«",-1),Yr={key:1,class:"page-item"},Xr=u("span",{"aria-hidden":"true"},"»",-1);function Jr(t,e,r,s,n,a){const i=rt("Head");return m(),v("div",Sr,[nt(i,{title:"Dashboard"}),xr,u("div",Tr,[u("div",kr,[u("div",Lr,[u("div",Ar,[st(u("input",{type:"text",class:"form-control",placeholder:"Keyword ...","onUpdate:modelValue":e[0]||(e[0]=o=>n.query=o)},null,512),[[at,n.query]]),u("button",{class:"btn btn-primary btn-sm",type:"button",onClick:e[1]||(e[1]=o=>a.fetchPage())}," Search ")])])])]),u("div",Pr,[u("div",qr,[(m(!0),v(ot,null,it(n.videos,o=>(m(),v("div",Ur,[u("div",Dr,[u("img",{width:o.snippet.thumbnails.medium.width,height:o.snippet.thumbnails.medium.height,src:o.snippet.thumbnails.medium.url,class:"card-img-top bg-secondary"},null,8,Hr),u("div",Or,re(a.formatDuration(o.contentDetails.duration)),1),u("div",Nr,[u("p",Br,re(o.snippet.title),1)]),u("button",{type:"button",class:"btn btn-warning rounded-0",onClick:y=>a.openModal(o)}," Download ",8,Ir)])]))),256))])]),n.loading?(m(),v("div",$r,Vr)):H("",!0),u("nav",jr,[u("ul",Fr,[n.nextToken?(m(),v("li",Kr,[u("a",{class:"page-link",href:"#",onClick:e[2]||(e[2]=ne(o=>a.prevPage(),["prevent"])),"aria-label":"Previous"},[zr,G(" Previous ")])])):H("",!0),n.nextToken?(m(),v("li",Yr,[u("a",{class:"page-link",href:"#",onClick:e[3]||(e[3]=ne(o=>a.nextPage(),["prevent"])),"aria-label":"Next"},[G(" Next "),Xr])])):H("",!0)])])])}const Zr=xe(Cr,[["render",Jr]]);export{Zr as default};