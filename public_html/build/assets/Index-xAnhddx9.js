import{Z as v,i as y,O as d,r as i,o as n,c as r,a as m,b as e,d as w,g as x,F as C,h as M,t as l,j as u,k as f,l as g,e as p,w as T}from"./app-ISzOvFh-.js";import{L as P}from"./AuthenticatedLayout-MJyUvD7w.js";import{P as D}from"./Pagination-SfE0ucM0.js";import{c as L}from"./createFolderModal-iHeTXeiq.js";import{_ as N}from"./_plugin-vue_export-helper-x3n3nnut.js";const V={layout:P,props:{tags:Object,filter:String},components:{Head:v,Link:y,Pagination:D},data(){return{type:this.filter}},methods:{filterTags(){d.get(route("tags",{filter:this.type}))},openCreateModal(){this.$vbsModal.open({content:L,contentProps:{name:""},contentEmits:{oncreate:this.createTag}})},createTag(o){this.$vbsModal.close(),o.length!=0&&d.post(route("tags.create"),{title:o})},deletePost(o){this.$vbsModal.confirm({title:"Delete post",message:"Do you want to delete this post ?"}).then(s=>{s&&d.delete(route("tags.destroy",{id:o}))})}}},B={class:"inertia-page"},S={class:"mb-4"},j={class:"d-flex justify-content-between mb-4 align-items-end"},E=e("h3",{class:"m-0"},"TAGS",-1),F={class:"d-flex gap-2"},H=e("option",{value:"untrashed"},"Active",-1),O=e("option",{value:"trashed"},"Trashed",-1),A=[H,O],G={class:"container px-0 mb-4"},I={class:"table"},R=e("thead",null,[e("tr",null,[e("th",{scope:"col",class:"d-none d-md-table-cell"},"#"),e("th",{scope:"col"},"Tag"),e("th",{scope:"col",class:"d-none d-md-table-cell"},"Date")])],-1),U={class:"d-none d-md-table-cell"},Z={class:"w-auto"},q={class:"mb-2"},z={class:"mb-2 text-muted d-md-none"},J={class:"links-group"},K=["href","onClick"],Q={class:"d-none d-md-table-cell w-25"};function W(o,s,c,X,_,a){const b=i("Head"),h=i("Link"),k=i("Pagination");return n(),r("div",B,[m(b,{title:"Posts"}),e("header",S,[e("div",j,[E,e("div",F,[e("button",{type:"button",class:"btn btn-primary btn-sm",onClick:s[0]||(s[0]=(...t)=>a.openCreateModal&&a.openCreateModal(...t))}," New "),w(e("select",{class:"form-select","onUpdate:modelValue":s[1]||(s[1]=t=>_.type=t),onChange:s[2]||(s[2]=(...t)=>a.filterTags&&a.filterTags(...t))},A,544),[[x,_.type]])])])]),e("div",G,[e("table",I,[R,e("tbody",null,[(n(!0),r(C,null,M(c.tags.data,t=>(n(),r("tr",null,[e("td",U,l(t.id),1),e("td",Z,[e("p",q,l(t.label),1),e("p",z," created on "+l(t.created_at),1),e("div",J,[t.deleted_at==null?(n(),u(h,{key:0,href:o.route("tags.show",t.id)},{default:f(()=>[g(" Edit ")]),_:2},1032,["href"])):p("",!0),e("a",{href:`/dashmin/tags/${t.id}`,onClick:T(Y=>a.deletePost(t.id),["prevent"]),class:"text-danger"},"Delete",8,K),t.deleted_at!=null?(n(),u(h,{key:1,class:"text-warning",href:o.route("tags.restore",t.id)},{default:f(()=>[g(" Restore ")]),_:2},1032,["href"])):p("",!0)])]),e("td",Q,l(t.created_at),1)]))),256))])])]),m(k,{links:c.tags.links},null,8,["links"])])}const ae=N(V,[["render",W]]);export{ae as default};
