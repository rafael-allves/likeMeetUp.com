import{o as d,c as _,a as l,w as a,b as e,i as n,t as $,u as o,l as c,p as P,j,d as L,k as m,f as h,y as D,T as O,r as N,e as I,v as A,Z as R}from"./app-7c167e6a.js";const M=["src"],H={__name:"ProfilePic",props:{profilePic:{type:String,required:!0}},setup(t){const s=t;return(i,r)=>(d(),_("img",{src:s.profilePic,class:"rounded-full w-full"},null,8,M))}};const x=(t,s)=>{const i=t.__vccOpts||t;for(const[r,p]of s)i[r]=p;return i},b=t=>(P("data-v-d1117b01"),t=t(),j(),t),V={key:0,id:"dropdownAvatar",class:"bg-white top-0 divide-gray-100 shadow-md w-full items-center px-10"},q={class:"w-[40px]"},U={class:"py-2 text-gray-700 dark:text-gray-200 flex flex-col text-center text-[1rem] mt-5 font-normal text-2xl"},F=b(()=>e("span",{class:"material-symbols-outlined"}," person ",-1)),G=b(()=>e("span",{class:"material-symbols-outlined"}," group_add ",-1)),Z=b(()=>e("span",{class:"material-symbols-outlined"}," add_circle ",-1)),J=b(()=>e("span",{class:"material-symbols-outlined"}," dashboard ",-1)),K={key:1,class:"invisible z-50 right-3 bg-white px-7 divide-y divide-gray-100 rounded-lg shadow w-44 absolute align-middle border"},Q={class:"w-[40px]"},W={class:"py-2 text-sm text-gray-700 dark:text-gray-200 flex flex-col gap-1"},X=b(()=>e("span",{class:"material-symbols-outlined"}," person ",-1)),Y=b(()=>e("span",{class:"material-symbols-outlined"}," group_add ",-1)),ee=b(()=>e("span",{class:"material-symbols-outlined"}," add_circle ",-1)),te=b(()=>e("span",{class:"material-symbols-outlined"}," dashboard ",-1)),se={class:"my-3 border-t-2 py-2"},oe=b(()=>e("span",{class:"material-symbols-outlined"}," logout ",-1)),le={__name:"DropDownAvatar",props:{user:{type:Object},responsive:{type:Boolean}},setup(t){const s=t,i=window.location.toString().split("#")[0];return(r,p)=>s.responsive?(d(),_("section",V,[l(o(c),{href:`/users/${t.user.id}`,class:"text-gray-900 flex gap-1 items-center border-b-2 pb-1 mt-3 font-bold text-2xl"},{default:a(()=>[e("div",q,[l(H,{profilePic:s.user.profile_pic},null,8,["profilePic"])]),n(" "+$(s.user.name),1)]),_:1},8,["href"]),e("ul",U,[e("li",null,[l(o(c),{href:`/users/${t.user.id}/edit`,class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[F,n(" Editar perfil ")]),_:1},8,["href"])]),e("li",null,[l(o(c),{href:"/events/create",class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[G,n(" Criar um Evento ")]),_:1})]),e("li",null,[l(o(c),{href:`${o(i)}#newPublication`,class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[Z,n(" Publicação ")]),_:1},8,["href"])]),e("li",null,[l(o(c),{href:"/dashboard",class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[J,n(" Dashboard ")]),_:1})])])])):(d(),_("section",K,[l(o(c),{href:`/users/${t.user.id}`,class:"text-gray-900 flex gap-1 items-center border-b-2 pb-1 mt-3 font-bold text-md"},{default:a(()=>[e("div",Q,[l(H,{profilePic:s.user.profile_pic},null,8,["profilePic"])]),n(" "+$(s.user.name),1)]),_:1},8,["href"]),e("ul",W,[e("li",null,[l(o(c),{href:`users/${s.user.id}/edit`,class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[X,n(" Editar perfil ")]),_:1},8,["href"])]),e("li",null,[l(o(c),{href:"/events/create",class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[Y,n(" Criar um Evento ")]),_:1})]),e("li",null,[l(o(c),{href:`${o(i)}#newPublication`,class:"text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[ee,n(" Publicação ")]),_:1},8,["href"])]),e("li",null,[l(o(c),{href:"/dashboard",class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[te,n(" Dashboard ")]),_:1})]),e("li",se,[l(o(c),{href:"/logout",class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[oe,n(" Sair ")]),_:1})])])]))}},B=x(le,[["__scopeId","data-v-d1117b01"]]),re="/build/assets/logo-7448dd1e.png";function S(t,s){if(!document.getElementById("menu").contains(t.target)){s.setAttribute("aria-expanded","false"),s.nextElementSibling.style.visibility="hidden",s.classList.remove("active");const r=document;r.removeEventListener("click",S),r.removeEventListener("touchstart",S,{passive:!1})}}function g(t){t.stopImmediatePropagation();const s=t.currentTarget.getAttribute("aria-expanded");if(t.currentTarget.nextElementSibling.style.visibility=s=="true"?"hidden":"visible",t.currentTarget.setAttribute("aria-expanded",s=="true"?"false":"true"),t.target.classList.remove("active"),s=="false"){const i=document;t.target.classList.add("active");const r=t.currentTarget;i.addEventListener("click",p=>{S(p,r)}),i.addEventListener("touchstart",p=>{S(p,r)})}}const y=t=>(P("data-v-0dbb2629"),t=t(),j(),t),ae={class:"flex flex-row items-center justify-between shadow-md px-10 py-2"},ne=["src"],ie={class:"flex flex-row"},ce={class:"menuBg invisible w-full justify-center max-md:items-center max-md:flex-col absolute top-14 right-0 z-30"},de={id:"menu",class:"menu absolute max-md:flex h-full max-md:items-center max-md:flex-col"},ue={class:"flex flex-col w-full px-10 h-full relative mt-8 text-[1rem] font-medium text-2xl"},pe=y(()=>e("span",{class:"material-symbols-outlined"}," person_add ",-1)),fe=y(()=>e("span",{class:"material-symbols-outlined"}," menu_book ",-1)),_e=y(()=>e("span",{class:"material-symbols-outlined"}," groups ",-1)),be=y(()=>e("span",{class:"material-symbols-outlined"}," logout ",-1)),he={class:"gap-3 max-md:hidden flex flex-row"},me={key:0},ve=y(()=>e("span",{class:"sr-only"},"Open user menu",-1)),ge={class:"w-[40px]"},xe={__name:"Navbar",props:{authStatus:{type:Boolean},user:{type:Object}},setup(t){const s=t;return(i,r)=>(d(),_("header",ae,[l(o(c),{href:"/"},{default:a(()=>[e("img",{width:"40",height:"40",src:o(re),alt:"Logo"},null,8,ne)]),_:1}),e("nav",ie,[e("button",{class:"md:hidden block hamburger",onClick:r[0]||(r[0]=L((...p)=>o(g)&&o(g)(...p),["prevent"])),onTouchstart:r[1]||(r[1]=L((...p)=>o(g)&&o(g)(...p),["prevent"])),"aria-expanded":"false"},null,32),e("section",ce,[e("div",de,[s.authStatus?(d(),m(B,{key:0,user:s.user,responsive:!0},null,8,["user"])):h("",!0),e("ul",ue,[e("li",null,[s.authStatus?h("",!0):(d(),m(o(c),{key:0,href:"/users/create",class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[pe,n(" Login/Registro ")]),_:1}))]),e("li",null,[l(o(c),{href:"/about",class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[fe,n(" Sobre ")]),_:1})]),e("li",null,[l(o(c),{href:"/events",class:"text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"},{default:a(()=>[_e,n(" Eventos ")]),_:1})]),s.authStatus?(d(),m(o(c),{key:0,href:"/logout",class:"text-black w-10/12 flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover absolute bottom-2"},{default:a(()=>[be,n(" Sair ")]),_:1})):h("",!0)])])]),e("div",he,[l(o(c),{href:"/about",class:"flex items-center"},{default:a(()=>[n(" Sobre ")]),_:1}),l(o(c),{href:"/events",class:"flex items-center"},{default:a(()=>[n(" Eventos ")]),_:1}),t.authStatus?(d(),_("div",me,[e("button",{id:"dropdownUserAvatarButton",class:"flex text-sm rounded-full focus:ring-4 focus:ring-gray-300",type:"button","aria-expanded":"false",onClick:r[2]||(r[2]=p=>o(g)(p))},[ve,e("div",ge,[l(H,{profilePic:s.user.profile_pic,responsive:!1},null,8,["profilePic"])])]),l(B,{user:s.user},null,8,["user"])])):(d(),m(o(c),{key:1,href:"/users/create"},{default:a(()=>[n(" Login/Registro ")]),_:1}))])])]))}},ye=x(xe,[["__scopeId","data-v-0dbb2629"]]),we={},ke={id:"bg",class:"w-full h-full absolute top-0 z-40 flex justify-center items-center"};function $e(t,s){return d(),_("section",ke,[D(t.$slots,"default")])}const Se=x(we,[["render",$e]]);const w=t=>(P("data-v-8dedfd17"),t=t(),j(),t),Pe=["onSubmit"],je={key:0,class:"grid grid-cols-1 bg-white relative w-full h-[90%] px-1 py-1 mt-2"},Ce={class:"w-full flex items-center justify-center border-1 z-10 border-black h-full relative bg-white",id:"previewDiv"},Ee=w(()=>e("label",{for:"image",class:"w-full h-full absolute flex z-0 items-center justify-center cursor-pointer"},[e("span",{class:"material-symbols-outlined"}," add_a_photo ")],-1)),Le={class:"flex items-end justify-between"},He=w(()=>e("span",{class:"material-symbols-outlined"}," delete ",-1)),Ie=w(()=>e("span",{class:"material-symbols-outlined"}," add_a_photo ",-1)),Ae={key:1,class:"bg-white grid grid-cols-1 mt-2 h-[90%]"},Be={class:"w-full h-full flex flex-col gap-2 pt-1"},De={class:"flex items-end mt-2 px-1"},Ne=w(()=>e("span",{class:"material-symbols-outlined"}," photo_camera ",-1)),Te=[Ne],ze=w(()=>e("span",{class:"material-symbols-outlined"}," publish ",-1)),Oe={__name:"NewPublication",setup(t){const s=O({title:"",content:"",image:""}),i=N(!1),r=()=>{s.post(route("CreatePublication"),{onSuccess:()=>{s.reset("title","content","image")}})},p=()=>{window.location=window.location.toString().split("#newPublication")[0]};async function T(v){const u=v.target.files[0];if(u)try{const f=await z(u);document.getElementById("imgPreview").setAttribute("src",f)}catch(f){console.error("Erro ao ler o arquivo:",f)}}function z(v){return new Promise((u,f)=>{const C=new FileReader;C.onload=E=>u(E.target.result),C.onerror=E=>f(E),C.readAsDataURL(v),s.image=v})}return(v,u)=>(d(),m(Se,null,{default:a(()=>[e("form",{onSubmit:L(r,["prevent"]),class:"w-[94%] max-w-[500px] px-2 py-2 bg-white h-[63%] rounded-md"},[e("div",{class:"flex items-end justify-end h-auto"},[e("span",{class:"material-symbols-outlined cursor-pointer hover:text-red-600",id:"exit",onClick:p}," cancel ")]),i.value?(d(),_("section",je,[e("div",Ce,[e("img",{class:"object-fill cursor-pointer",id:"imgPreview",onClick:u[0]||(u[0]=f=>f.target.nextElementSibling.focus())}),e("input",{type:"file",name:"image",id:"image",onChange:T,class:"hidden"},null,32),Ee]),e("div",Le,[e("button",{class:"bg-red-600 text-white flex items-center justify-center px-2 py-2 gap-1",type:"button",onClick:u[1]||(u[1]=f=>{o(s).image="",i.value=!1})},[He,n(" Deletar ")]),e("button",{class:"bg-green-600 text-white flex items-center justify-center px-2 py-2 gap-1",type:"button",onClick:u[2]||(u[2]=f=>i.value=!1)},[Ie,n(" Adicionar ")])])])):(d(),_("section",Ae,[e("div",Be,[I(e("input",{type:"text",placeholder:"Título da publicação",class:"w-full","onUpdate:modelValue":u[3]||(u[3]=f=>o(s).title=f)},null,512),[[A,o(s).title]]),I(e("textarea",{name:"",id:"",rows:"9",placeholder:"Descreva sua Publicação","onUpdate:modelValue":u[4]||(u[4]=f=>o(s).content=f)},null,512),[[A,o(s).content]])]),e("div",De,[e("button",{type:"button",onClick:u[5]||(u[5]=f=>i.value=!i.value),class:"rounded-full shadow-sm hover:shadow-2xl shadow-black border w-[40px] h-[40px] flex items-center justify-center"},Te)]),e("div",{class:"flex items-end justify-end"},[e("button",{class:"text-white bg-green-600 px-1 py-2 mb-2 mr-2 flex items-center justify-center gap-2",onClick:r},[n(" Publicar "),ze])])]))],40,Pe)]),_:1}))}},Re=x(Oe,[["__scopeId","data-v-8dedfd17"]]);const k=t=>(P("data-v-a2aabc2c"),t=t(),j(),t),Me={class:"relative",id:"layout"},Ve=k(()=>e("link",{rel:"preconnect",href:"https://fonts.googleapis.com"},null,-1)),qe=k(()=>e("link",{rel:"preconnect",href:"https://fonts.gstatic.com",crossorigin:""},null,-1)),Ue=k(()=>e("link",{href:"https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap",rel:"stylesheet"},null,-1)),Fe=k(()=>e("link",{rel:"stylesheet",href:"https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"},null,-1)),Ge={class:"pb-20"},Ze={key:1,class:"relative"},Je={key:0,class:"text-red-950 bg-red-400 w-full text-center absolute z-40"},Ke={key:1,class:"text-green-950 bg-green-600 w-full text-center absolute z-40"},Qe=k(()=>e("footer",{class:"flex items-center absolute left-0 bottom-0 justify-center w-full bg-black h-20 text-rose-50"}," Rafa Events © 2023 ",-1)),We={__name:"MainLayout",props:{authStatus:{type:Boolean,required:!0},user:{type:Object,required:!0},status:{type:Object}},setup(t){const s=t,i=N(window.location.hash);return(r,p)=>(d(),_("div",Me,[l(o(R),null,{default:a(()=>[Ve,qe,Ue,Fe]),_:1}),e("div",Ge,[l(ye,{authStatus:s.authStatus,user:s.user},null,8,["authStatus","user"]),i.value=="#newPublication"?(d(),m(Re,{key:0})):h("",!0),s.status!=null?(d(),_("div",Ze,[s.status.error!=null?(d(),_("p",Je,$(s.status.error),1)):h("",!0),s.status.okay!=null?(d(),_("p",Ke,$(s.status.okay),1)):h("",!0)])):h("",!0),D(r.$slots,"default",{},void 0,!0)]),Qe]))}},Ye=x(We,[["__scopeId","data-v-a2aabc2c"]]);export{Ye as L,x as _,H as a,re as b};
