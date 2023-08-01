<script setup>
   import { ref } from 'vue';
   import { Link, Head } from '@inertiajs/vue3';

   import Layout from '@/Layouts/MainLayout.vue';
   import ProfilePic from '@/Components/ProfilePic.vue';
   import VerticalCard from '@/Components/VerticalCard.vue';
   import HorizontalCard from '@/Components/HorizontalCard.vue';

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

   const events = ref([
      ...props.user.events,
      ...props.user.event_as_participant
   ]);



   function timeElapsed(publication)
   {
      const minutes = Math.round((new Date().getTime() - new Date(publication.created_at).getTime()) / (1000 * 60));
      
      if(minutes < 60)return `${minutes} min`;
      const hours = Math.round(minutes / 60);
      
      if(hours == 1)return `${hours} hora`
      if(hours < 24)return `${hours} horas`;
      const days = Math.round(hours / 24);

      if(days == 1)return `${days} dia`
      if(days < 7) return `${days} dias`;
      const weeks = Math.round(days / 7);

      if(weeks == 1)return `${weeks} semana`
      if(weeks < 4)return `${weeks} semanas`;
      const mounths = Math.round(days / 30);
      
      if(mounths == 1)return `${mounths} mês`
      if(mounths < 12)return `${mounths} meses`;
      const years = Math.round(mounths / 12);

      return `${years} anos`
   }


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
            <section class="border-2 lg:w-[70%] w-full py-3">
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
                  class="mt-10 w-full overflow-y-auto max-h-[600px]"
                  >
                     <article v-for="publication in props.user.publications"
                     class="px-5 shadow-md">
                        <p class="text-textMuted">
                           Publicado há •
                           {{ timeElapsed(publication) }}
                        </p>
                        <HorizontalCard
                        :content="publication"
                        type="publication"
                        />
                     </article>
                  </section>
                  
                  <section v-if="currentUrl ==='#events'"
                  class="mt-10 border-t-2 overflow-y-auto max-h-[600px] px-10"
                  >
                     <section 
                     class="grid grid-cols-profile gap-3 mt-2 py-1 px-3 shadow">
                        <article v-for="event in events"
                        class="shadow-md shadow-black">
                           <VerticalCard 
                           type="events"
                           :content="event"
                           :owner="event.user_id === user.id" 
                           />
                        </article>
                     </section>
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
      border-top: 2px solid #3949AB;
      
      font-weight: bold;
   }
</style>