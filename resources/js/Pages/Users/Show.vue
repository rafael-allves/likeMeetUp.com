<script setup>
   import { Link, Head } from '@inertiajs/vue3';

   import Layout from '@/Layouts/MainLayout.vue';
   import ProfilePic from '@/Components/ProfilePic.vue';
   import Card from '@/Components/Card.vue';

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

   if(window.location.hash === '')window.location.hash = '#publicacoes'
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
         <main class="lg:flex md:w-[70%] gap-3 w-full">
            <section class="flex items-center justify-center lg:w-[30%] w-full">
               <div class="w-full">

                  <section class="w-full flex justify-center items-center">
                     <div class="md:w-full max-w-[300px]">
                        <ProfilePic :profilePic="user.profile_pic"/>
                     </div>
                  </section>
                  <div class="border-b-2">
                     <h2 class="text-3xl font-extrabold text-center mt-2 divide-y-2">
                        {{ 
                           user.name
                        }}
                     </h2>
                  </div>
                  <div class="flex flex-col items-center px-4 md:px-0">
                     <h3 class="my-3 flex items-center justify-center">
                        <span class="material-symbols-outlined">
                           group
                        </span>
                        X SEGUIDORES - X Seguindo
                     </h3>
                     
                     <p class="break-words my-5 w-[300px] md:w-full">
                        {{ 
                           user.bio 
                        }}
                     </p>
                     
                     <button v-if="user.id == userSession.id"
                     class="text-center md:w-full border-colorSecondary rounded border-2 bg-colorPrimary text-white w-[300px]">
                           Editar Perfil
                     </button>

                  </div>
                  <!--Quando clicar no perfil acima quero que quando clicar mostre um form pro cara mudar inpage mesmo-->
               </div>
            </section>
            <section class="border-2 lg:w-[70%] w-full px-10 py-3 overflow-y-auto">
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
                  <section v-if="currentUrl ==='#publicacoes'"
                  class="mt-10"
                  >
                     
                  </section>
                  <section v-else
                  class="grid grid-cols-profile gap-3 mt-10"
                  >
                     <article v-for="event in [...user.events, ...user.event_as_participant]"
                     class="shadow-md shadow-black">
                        <Card 
                        type="events"
                        :content="event"
                        :owner="event.user_id === user.id" 
                        />
                     </article>

                  </section>
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