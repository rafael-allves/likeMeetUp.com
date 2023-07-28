<script setup>
   import { ref } from 'vue';
   import { Head, useForm } from '@inertiajs/vue3';
   
   import Layout from '@/Layouts/MainLayout.vue';
   
   import CheckBox from '@/Components/CheckBox.vue';
   import PrimaryButton from '@/Components/PrimaryButton.vue';

   const props = defineProps({
      user: {
       default: null,
       type: Object,
       required: true,
      },

      status: {
          type: Object,
      },

      event: { 
        type: Object,
        required: true,
      }
   });

   if(props.event.items == null)props.event.items = [];
   
   const eventForm = useForm({
        ...props.event,
        date: new Date(props.event.date).toISOString().slice(0, 10),
        
    })


   const dateError = ref('');

   const options =[
        'Open Bar',
        'Open Food',
        'Buffet',
        'Cadeiras',
        'Palco',
        'Palestra',
        'Musica',
    ]

   function sendImg(evt){
        const fileInput = document.getElementById('eventPic');
        fileInput.addEventListener('change', ()=>{
            const newEventPic = fileInput.files[0];
            if(newEventPic){
                const preview = new FileReader();

                preview.addEventListener('load', function (){
                    document.getElementById('previewImg').setAttribute('src', preview.result);
                })
                preview.readAsDataURL(newEventPic);
                eventForm.image = newEventPic;
            }
        })
        const label = evt.currentTarget;
        label.style.display = 'none'
        label.nextElementSibling.style.filter = 'blur(0)';
    } 
    function showLabel(evt){
        const label = evt.currentTarget.children[0];
        label.style.display = 'flex';
        label.nextElementSibling.style.filter = 'blur(3px)';
    }
    function hideLabel(evt){
        const label = evt.target.children[0];
        label.style.display = 'none'
        label.nextElementSibling.style.filter = 'blur(0)';
    }
    function editEvent(){
        const date = new Date(eventForm.date);
        if(date <= Date.now()){
            dateError.value = 'Data inválida';
            return;
        }
        eventForm.put(`/events/${props.event.id}`);
    }
</script>

<template>
    <Head>
        <title>
            Editando {{ event.title }}
        </title>
    </Head>
   <Layout
   :authStatus='props.user.name != undefined'
   :user='props.user'
   :status='props.status'
    >
    <main class="flex flex-col items-center px-2">
                <form class="w-full mt-3 flex flex-col items-center">
                    <div class="min-w-[300px] border border-black flex justify-center align-center relative mb-3"
                    @mouseenter="showLabel"
                    @mouseleave="hideLabel"
                    @touchstart="showLabel">
                        <label for="eventPic" class="text-center cursor-pointer w-full h-full absolute left-0 top-0 z-10 flex justify-center items-center"
                        @click="sendImg">
                            <span class="material-symbols-outlined">
                                add_photo_alternate
                            </span>
                        </label>

                        <img alt="Preview Events" :src="'/' + eventForm.image" id="previewImg"/>
                        
                        <input type="file"
                        name="eventPic"
                        id="eventPic"
                        class="hidden"
                        @load="sendImg"
                        required
                        >
                    </div>

                    <div class="flex flex-col min-w-[300px] w-[50%] mb-2">
                        <label for="title">
                            Título do Evento
                        </label>
                        <input type="text" class="rounded border-colorPrimary"
                        id="title" name="title"
                        placeholder="Título do Evento"
                        v-model="eventForm.title"
                        required
                        minlength="4">
                    </div>

                    <div class="flex flex-col min-w-[300px] w-[50%] mb-2">
                        <label for="local">
                            Local do Evento
                        </label>
                        <input type="text" class="rounded border-colorPrimary"
                        id="local" name="local"
                        placeholder="Local do Evento"
                        v-model="eventForm.local"
                        required
                        minlength="4">
                    </div>

                    <div class="flex flex-col min-w-[300px] w-[50%] mb-2">
                        <label for="data">
                            Data do Evento
                        </label>
                        <input type="date" class="rounded border-colorPrimary"
                        id="data" name="data"
                        v-model="eventForm.date"
                        
                        required
                        >
                        <p v-if="dateError != ''"
                        class="text-red-700 text-sm">
                            {{ dateError }}
                        </p>
                    </div>

                    <div>
                        <label>
                            O evento é privado ?
                        </label>
                        <div class="flex items-center justify-center gap-2">
                            <input type="radio" name="private" id="privateYes" :value=true v-model="eventForm.private">
                            <label for="privateYes">Sim</label>

                            <input type="radio" name="private" id="privateNo" :value=false v-model="eventForm.private">
                            <label for="privateNo">Não</label>
                        </div>
                    </div>

                    <div class="flex flex-col min-w-[300px] w-[50%] mb-2">
                        <label for="descricao">
                            Descrição do Evento
                        </label>
                        <textarea name="descricao" id="descricao" cols="30" rows="10"
                        v-model="eventForm.description"
                        required
                        minlength="50">
                            {{ eventForm.description }}
                        </textarea>
                    </div>
                    
                    <section class="flex flex-col min-w-[300px] w-[50%] mb-2">
                        <label>
                            O que vai ter no evento:
                        </label>

                        <div v-for="option in options">
                            <label class="flex items-center">
                                <CheckBox 
                                v-model="eventForm.items"
                                :checked="eventForm.items.filter((check) => check === option) != []"
                                :items="eventForm.items"
                                :value="option"
                                />
                                <span class="ml-2 text-sm text-textColor">
                                    {{ option }}
                                </span>
                            </label>
                        </div>
                    </section>
                    <div class="w-[300px] mb-3">
                        <PrimaryButton @click="editEvent">
                            Editar Evento
                        </PrimaryButton>
                    </div>
                </form>
            </main>
   </Layout>
</template>

<style scoped>
</style>