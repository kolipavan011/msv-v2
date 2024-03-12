import{Z as v,i as y,O as d,r as i,o as n,c as r,a as m,b as e,d as P,g as w,F as x,h as C,t as l,j as p,k as u,l as g,e as f,w as M}from"./app-bc8oKP5j.js";import{L as D}from"./AuthenticatedLayout-PFov8y6W.js";import{P as L}from"./Pagination-lQ-BUWKA.js";import{c as N}from"./createFolderModal-mm_C8CPG.js";import{_ as V}from"./_plugin-vue_export-helper-x3n3nnut.js";const B={layout:D,props:{pages:Object,filter:String},components:{Head:v,Link:y,Pagination:L},data(){return{type:this.filter}},methods:{filterPages(){d.get(route("pages",{filter:this.type}))},openCreateModal(){this.$vbsModal.open({content:N,contentProps:{name:""},contentEmits:{oncreate:this.createPage}})},createPage(a){this.$vbsModal.close(),a.length!=0&&d.post(route("pages.create"),{title:a})},deletePost(a){this.$vbsModal.confirm({title:"Delete page",message:"Do you want to delete this page ?"}).then(s=>{s&&d.delete(route("pages.destroy",{id:a}))})}}},E={class:"inertia-page"},S={class:"mb-4"},j={class:"d-flex justify-content-between mb-4 align-items-end"},F=e("h3",{class:"m-0"},"PAGES",-1),H={class:"d-flex gap-2"},O=e("option",{value:"untrashed"},"Active",-1),A=e("option",{value:"trashed"},"Trashed",-1),T=[O,A],G={class:"container px-0 mb-4"},I={class:"table"},R=e("thead",null,[e("tr",null,[e("th",{scope:"col",class:"d-none d-md-table-cell"},"#"),e("th",{scope:"col"},"Page"),e("th",{scope:"col",class:"d-none d-md-table-cell"},"Date")])],-1),U={class:"d-none d-md-table-cell"},Z={class:"w-auto"},q={class:"mb-2"},z={class:"mb-2 text-muted d-md-none"},J={class:"links-group"},K=["href","onClick"],Q={class:"d-none d-md-table-cell w-25"};function W(a,s,c,X,_,o){const b=i("Head"),h=i("Link"),k=i("Pagination");return n(),r("div",E,[m(b,{title:"Posts"}),e("header",S,[e("div",j,[F,e("div",H,[e("button",{type:"button",class:"btn btn-primary btn-sm",onClick:s[0]||(s[0]=(...t)=>o.openCreateModal&&o.openCreateModal(...t))}," New "),P(e("select",{class:"form-select","onUpdate:modelValue":s[1]||(s[1]=t=>_.type=t),onChange:s[2]||(s[2]=(...t)=>o.filterPages&&o.filterPages(...t))},T,544),[[w,_.type]])])])]),e("div",G,[e("table",I,[R,e("tbody",null,[(n(!0),r(x,null,C(c.pages.data,t=>(n(),r("tr",null,[e("td",U,l(t.id),1),e("td",Z,[e("p",q,l(t.label),1),e("p",z," created on "+l(t.created_at),1),e("div",J,[t.deleted_at==null?(n(),p(h,{key:0,href:a.route("pages.show",t.id)},{default:u(()=>[g(" Edit ")]),_:2},1032,["href"])):f("",!0),e("a",{href:`/dashmin/pages/${t.id}`,onClick:M(Y=>o.deletePost(t.id),["prevent"]),class:"text-danger"},"Delete",8,K),t.deleted_at!=null?(n(),p(h,{key:1,href:a.route("pages.restore",t.id),class:"text-warning"},{default:u(()=>[g(" Restore ")]),_:2},1032,["href"])):f("",!0)])]),e("td",Q,l(t.created_at),1)]))),256))])])]),m(k,{links:c.pages.links},null,8,["links"])])}const oe=V(B,[["render",W]]);export{oe as default};