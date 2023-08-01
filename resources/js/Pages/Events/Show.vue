<script setup>
   import { Link, Head, useForm } from '@inertiajs/vue3'
   
   import Layout from '@/Layouts/MainLayout.vue'

   import ProfilePic from '@/Components/ProfilePic.vue';

   const props = defineProps({
        dono: {
            type: Object,
            required: true,
        },

        user: {
        default: null,
        type: Object,
        required: true,
        },

        status: {
            type: Object,
        },

        event:{
            type: Object,
            required: true
        }
   });
  

   const eventForm = useForm({});

   const join = () => {
        eventForm.post(`/events/join/${props.event.id}`);
    }
    const leave = () => {
        eventForm.post(`/events/leave/${props.event.id}`);
    }
</script>

<template>
   <Layout
   :authStatus='props.user.name != undefined'
   :user='props.user'
   :status="props.status"
    >
    <Head>
        <title>
            {{ props.event.title }}
        </title>
    </Head>
        <main class="md:px-20">
            <section class="lg:flex w-full mt-4">
                <section class="lg:w-[50%] w-full min-w-[300px] flex justify-center">
                    <img :src="'/' + props.event.image" alt="Event Image"
                    class="object-fit flex justify-center">
                </section>
                <section class="lg:w-[50%]">
                    <h1 class="text-3xl font-bold mb-5">
                        {{ props.event.title }}
                    </h1>
                    <h3 class="text-xl flex text-center items-center gap-3 mt-2">
                        <span class="material-symbols-outlined text-textMuted">
                            calendar_month
                        </span>
                        {{ 
                            `
                                ${ new Date(props.event.date).getDate().toString().length != 1 ? 
                                    new Date(props.event.date).getDate() :
                                    '0'.concat(new Date(props.event.date).getDay().toString()) }
                                /
                                ${(new Date(props.event.date).getMonth() + 1).toString().length != 1 ?
                                    new Date(props.event.date).getMonth() + 1 :
                                    '0'.concat(new Date(props.event.date).getMonth() + 1)}
                                /
                                ${new Date(props.event.date).getFullYear()}
                            ` 
                        }}
                    </h3>
    
                    <h3 class="text-xl flex text-center items-center gap-3 mt-2">
                        <span class="material-symbols-outlined text-textMuted">
                            location_on
                        </span>
                        {{ props.event.local }}
                    </h3>
    
                    <h2 class="text-xl font-bold mb-5">
                        <Link :href="`/users/${props.dono.id}`"
                        class="mt-3 flex text-center items-center gap-2">
                            <span class="material-symbols-outlined text-yellow-600">
                                star
                            </span>
                            <div class="w-[40px]">
                                <ProfilePic :profilePic="props.dono.profile_pic" />
                            </div>

                            {{ props.dono.name }}
                        </Link>
                        <section v-if="props.user.id === props.dono.id"
                        class="flex my-5 gap-2 px-2">
                            <Link class="bg-colorSecondary w-[50%] py-2 shadow-black shadow-xl text-white flex items-center gap-4 justify-center"
                            :href="`/events/${props.event.id}/edit`">
                                Editar
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </Link>
                            <form
                            @submit.prevent=""
                            class="w-[50%]"
                            >
                                <button 
                                type="submit"
                                class="bg-red-700 w-full py-2 shadow-black shadow-xl text-white flex items-center gap-4 justify-center"
                                >
                                Excluir
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                                </button>
                            </form>
                        </section>
                    </h2>
                    <p class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-textMuted">
                            group
                        </span>
                        {{ props.event.participants.length }}
                        {{props.event.participants.length == 1 ? 'Participante' : 'Participantes'}}
                    </p>
                    <div class="md:mt-3 mt-6">
                        <form 
                        v-if="props.event.participants.filter((user) => user.id == props.user.id).length == 0"
                        @submit.prevent="join">
                            <button type="submit"
                            class="bg-colorPrimary flex items-center gap-3 text-white font-bold px-4 py-2 rounded shadow-lg shadow-black">
                                Entrar no Evento
                                <span class="material-symbols-outlined">
                                    door_open
                                </span>
                            </button>
                        </form>
                        <form v-else
                        @submit.prevent="leave">
                            <button type="submit"
                            class="bg-red-700 text-white px-3 py-2 font-bold flex items-center gap-2 rounded shadow-lg shadow-black">
                                Sair do Evento
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </form>
                    </div>
                </section>

            </section>
            <section class="mt-5">
                <section 
                v-if="props.event.items != null && props.event.items.length > 0"
                >
                    <h2 
                    class="text-2xl font-extrabold" 
                    >
                        O Evento Conta Com:
                    </h2>
                    <div class="flex flex-wrap">
                        <h3 v-for="item in props.event.items"
                        class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-yellow-600">
                            play_arrow
                        </span>
                        {{ item }}
                        </h3>
                    </div>
                </section>
                <section class="mt-5">
                    <h2 class="text-2xl font-extrabold">
                        Sobre O Evento:
                    </h2>
                    <p class="w-full break-words">
                        {{ props.event.description }}
                    </p>
                </section>
            </section>
        </main>
   </Layout>
</template>

<style scoped>
    span{
        font-size: 30px;
    }

    img{
        object-fit: fill;
    }
</style>