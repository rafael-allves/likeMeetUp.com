<script setup>
   import { Link, Head, useForm } from '@inertiajs/vue3'
   import Layout from '@/Layouts/MainLayout.vue'
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

   const eventForm = useForm({
        id: props.event.id,
   });

   const join = () => {
        eventForm.post(route(`joinEvent`));
    }
    console.log(props.status);
</script>

<template>
   <Layout
   :authStatus='props.user.name != undefined'
   :user='props.user'
    >
    <Head>
        <title>
            {{ props.event.title }}
        </title>
    </Head>
        <main class="md:flex w-full mt-4">
            <div class="md:w-[50%] w-full min-w-[300px] flex justify-center">
                <img :src="'/' + props.event.image" alt="Event Image"
                class="object-fit flex justify-center">
            </div>
            <div>
                <h1 class="text-3xl font-bold">
                    {{ props.event.title }}
                </h1>
                <h3 class="text-xl flex text-center items-center gap-3 mt-2">
                    <span class="material-symbols-outlined text-textMuted">
                        calendar_month
                    </span>
                    {{ 
                        `
                            ${ new Date(props.event.date).getDay().toString().length != 1 ? 
                                new Date(props.event.date).getDay() :
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

                <h2 class="text-xl font-bold">
                    <Link :href="`/users/${props.dono.id}`"
                    class="mt-3 flex text-center items-center gap-2">
                        <span class="material-symbols-outlined text-yellow-600">
                            star
                        </span>
                        <img :src="props.dono.profile_pic" 
                        alt="Perfil do Dono do Evento"
                        width="40"
                        height="40"
                        />
                        {{ props.dono.name }}
                    </Link>
                    <section v-if="props.user.id === props.dono.id"
                    class="flex mt-3 gap-2 px-2">
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
                <div class="md:mt-3 mt-6">
                    <form 
                    v-if="!props.event.users.filter((user) => user == props.user) == []"
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
                        class="bg-red-700 text-white px-3 py-2 font-bold">
                            Sair do Evento
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </main>
   </Layout>
</template>

<style scoped>
    span{
        font-size: 30px;
    }
</style>