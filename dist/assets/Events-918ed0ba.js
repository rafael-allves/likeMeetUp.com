import{T as h,o as s,k as u,w as c,b as e,d as m,e as f,v as p,u as o,c as n,F as _,h as v,a as y,i as x,l as b}from"./app-7c167e6a.js";import{L as w}from"./MainLayout-35eb279d.js";import{_ as g}from"./HorizontalCard-5f967799.js";const k={class:"w-full lg:px-40 bg-slate-100 min-h-[84vh]"},E=["onSubmit"],j={class:"w-full h-full md:w-[500px] relative"},S=e("button",{type:"submit",class:"flex bg-colorPrimary justify-center items-center absolute h-full right-0 w-7 top-0 rounded-r-lg"},[e("span",{class:"material-symbols-outlined text-white"}," search ")],-1),B={class:"overflow-y-auto bg-white max-h-[80vh] py-3"},N={key:0},V={key:1},L=e("h2",null," Nenhum Evento Encontrado ",-1),C={__name:"Events",props:{user:{default:null,type:Object,required:!0},events:{type:Array,required:!0},status:{type:Object}},setup(i){const t=i,a=h({search:""}),d=()=>{a.get(route("events"))};return(M,l)=>(s(),u(w,{authStatus:t.user.name!=null,user:t.user,status:t.status},{default:c(()=>[e("div",k,[e("form",{class:"flex justify-center w-full mb-3 px-2 pt-3 bg-slate-100",onSubmit:m(d,["prevent"])},[e("div",j,[f(e("input",{type:"text","onUpdate:modelValue":l[0]||(l[0]=r=>o(a).search=r),name:"search",id:"search",placeholder:"Procure um Evento",class:"w-full border-textMuted border rounded-lg"},null,512),[[p,o(a).search]]),S])],40,E),e("main",B,[t.events.length>0?(s(),n("div",N,[(s(!0),n(_,null,v(t.events,r=>(s(),u(g,{content:r,key:r.id,type:"events"},null,8,["content"]))),128))])):(s(),n("div",V,[L,y(o(b),{href:"/events/create",class:"bg-colorPrimary text-white text-center flex items-center justify-center shadow h-[40px]"},{default:c(()=>[x(" Criar Evento ")]),_:1})]))])])]),_:1},8,["authStatus","user","status"]))}};export{C as default};
