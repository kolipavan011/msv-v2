import{i as c,r as i,o as e,c as o,b as s,F as d,h as l,a as _,k as h,l as p,t as m,q as u,x as v}from"./app-ISzOvFh-.js";import{_ as g}from"./_plugin-vue_export-helper-x3n3nnut.js";const f={name:"AuthenticatedLayout",components:{Link:c},data(){return{pages:["dashboard","posts","categories","tags","pages","media","vidbot","setting"]}}},b={class:"inertia-layout"},x={class:"navbar navbar-expand-lg navbar-dark bg-dark sticky-top"},k={class:"container"},y=s("a",{class:"navbar-brand",href:"#"},"Dashmin",-1),L=["href"],$=s("img",{width:"40px",height:"40px",class:"rounded-circle",src:"https://gravatar.com/avatar/96c61dea289cb9b68667116e0a62bd6a?s=200&d=robohash&r=x",alt:""},null,-1),w=[$],B={class:"my-4"},C={class:"container"},N={class:"row"},V={class:"col-12 col-md-3 col-lg-3 d-none d-md-block"},z={class:"nav flex-column"},D={class:"nav-item"},F={class:"col-12 col-md-9 col-lg-9"};function S(a,q,A,E,n,T){const r=i("Link");return e(),o("div",b,[s("nav",x,[s("div",k,[y,s("div",null,[s("a",{href:a.route("logout")},w,8,L)])])]),s("main",B,[s("div",C,[s("div",N,[s("div",V,[s("ul",z,[(e(!0),o(d,null,l(n.pages,t=>(e(),o("li",D,[_(r,{class:u(["nav-link text-capitalize px-0",a.$page.url.includes(t)?"text-primary fw-bold":"text-dark"]),href:a.route(t),"preserve-state":!1},{default:h(()=>[p(m(t),1)]),_:2},1032,["class","href"])]))),256))])]),s("div",F,[v(a.$slots,"default")])])])])])}const H=g(f,[["render",S]]);export{H as L};