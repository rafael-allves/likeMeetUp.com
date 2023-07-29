<script setup>
   import { Link, Head } from '@inertiajs/vue3';

   import Layout from '@/Layouts/MainLayout.vue';
   import ProfilePic from '@/Components/ProfilePic.vue';

   const props = defineProps({
      userSession: {
       default: null,
       type: Object,
       required: true,
      },

      user: {
         type: Object,
         required: true,
      },

      status: {
          type: Object,
      }
   });

   const currentUrl = window.location.hash;
</script>

<template>
   <Layout
   :authStatus='props.userSession.name != undefined'
   :user='props.userSession'
   :status='props.status'
    >
    <section>
      <div class="flex items-center justify-center mt-8">
         <main class="md:flex md:w-[70%] w-full">
            <section class="flex items-center justify-center">
               <div class="min-w-[300px] w-[30%]">
                  <ProfilePic :profilePic="user.profile_pic"/>
                  <div class="border-b-2">
                     <h2 class="text-3xl font-extrabold text-center mt-2 divide-y-2">
                        {{ 
                           user.name
                        }}
                     </h2>
                  </div>
                  <p>
                     {{ user.bio }}
                  </p>
                  <div class="px-2">
                     <button v-if="user.id == userSession.id"
                     class="text-center w-full border-colorSecondary rounded border-2 bg-colorPrimary text-white">
                           Editar Perfil
                     </button>
                  </div>
                  <!--Quando clicar no perfil acima quero que quando clicar mostre um form pro cara mudar inpage mesmo-->
                  <h3 class="my-3 px-6 flex items-center">
                     <span class="material-symbols-outlined">
                        group
                     </span>
                     X SEGUDORES - X Seguindo
                  </h3>
               </div>
            </section>
            <section class="border-2 md:w-[70%] w-full px-10 py-3">
               <section>
                  <div class="flex items-center gap-1 justify-center mt-3">
                     <Link href="#publicacoes"
                     :class="{'flex justify-center items-center gap-2 px-3 py-2': true, 'active': currentUrl === '#publicacoes'}">
                     <span class="material-symbols-outlined">
                        demography
                     </span>
                     Publicações
                     </Link>
      
                     <Link href="#events"
                     :class="{'flex justify-center items-center gap-2 px-3 py-2': true, 'active': currentUrl === '#events'}">
                     <span class="material-symbols-outlined">
                        groups
                     </span>
                     Eventos
                     </Link>
                  </div>
               </section>
            </section>
         </main>
      </div>
    </section>
   </Layout>
</template>

<style scoped>
   .active{
      border-top:1px solid #3949AB;
      
      font-weight: bold;
   }
</style>