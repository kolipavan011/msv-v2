import{Z as a,T as c,r as _,o as i,c as m,a as p,b as o,w as f,d as r,v as d,t as u,e as b,f as h}from"./app-ISzOvFh-.js";import{_ as v}from"./_plugin-vue_export-helper-x3n3nnut.js";const w={name:"login",props:{errors:Object},components:{Head:a},data(){return{form:c({email:null,password:null,remember:!1})}},methods:{login(){this.form.post(route("login"))}}},g={class:"py-4 vh-100"},x={class:"container",style:{"margin-top":"100px"}},y={class:"row justify-content-center"},k={class:"col-md-8"},V={class:"card bg-white"},L=o("div",{class:"card-header"},"Login",-1),M={class:"card-body"},B={class:"row mb-3"},C=o("label",{for:"email",class:"col-md-4 col-form-label text-md-end"},"Email",-1),H={class:"col-md-6"},N={key:0,class:"form-text text-danger"},U={class:"row mb-3"},j=o("label",{for:"password",class:"col-md-4 col-form-label text-md-end"},"Password",-1),q={class:"col-md-6"},D={class:"row mb-3"},E={class:"col-md-6 offset-md-4"},S={class:"form-check"},T=o("label",{class:"form-check-label",for:"remember"}," Remember Me ",-1),O=o("div",{class:"row mb-0"},[o("div",{class:"col-md-8 offset-md-4"},[o("button",{type:"submit",class:"btn btn-primary"}," Login ")])],-1);function P(R,e,Z,z,s,l){const n=_("Head");return i(),m("main",g,[p(n,{title:"Login"}),o("div",x,[o("div",y,[o("div",k,[o("div",V,[L,o("div",M,[o("form",{onSubmit:e[3]||(e[3]=f((...t)=>l.login&&l.login(...t),["prevent"]))},[o("div",B,[C,o("div",H,[r(o("input",{id:"email",type:"email",class:"form-control",name:"email",required:"",autocomplete:"email",autofocus:"","onUpdate:modelValue":e[0]||(e[0]=t=>s.form.email=t)},null,512),[[d,s.form.email]]),s.form.errors?(i(),m("div",N,u(s.form.errors.email),1)):b("",!0)])]),o("div",U,[j,o("div",q,[r(o("input",{id:"password",type:"password",class:"form-control",name:"password",required:"",autocomplete:"current-password","onUpdate:modelValue":e[1]||(e[1]=t=>s.form.password=t)},null,512),[[d,s.form.password]])])]),o("div",D,[o("div",E,[o("div",S,[r(o("input",{class:"form-check-input",type:"checkbox",name:"remember",id:"remember","onUpdate:modelValue":e[2]||(e[2]=t=>s.form.remember=t)},null,512),[[h,s.form.remember]]),T])])]),O],32)])])])])])])}const G=v(w,[["render",P]]);export{G as default};