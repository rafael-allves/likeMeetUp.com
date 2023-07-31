<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        event:{
            type: Object,
            required: true,
        },
        type: {
            type: String,
            required: true,
        }
    })

</script>

<template>
    <Link
    :href="`/${type}/${event.id}`"
    >
        <section class="block md:flex gap-1 mb-2 md:px-10">
            <div class="w-[30%] max-w-[300px] min-w-[200px]">
                <img :src="'/' + event.image" alt="Foto do Evento">
            </div>
            <div class="px-3 py-3 md:px-10">
                <h2 class="text-lg">
                    {{ event.title.slice(0, 22) }}
                    <span v-if="event.title.length > 22">
                        ...
                    </span>
                </h2>
                <h3 class="text-textMuted font-bold" v-if="type === 'events'">
                    {{ `
                    ${ new Date(event.date).getDate().toString().length != 1 ? 
                        new Date(event.date).getDate() :
                        '0'.concat(new Date(event.date).getDay().toString()) }
                    /
                    ${(new Date(event.date).getMonth() + 1).toString().length != 1 ?
                        new Date(event.date).getMonth() + 1 :
                        '0'.concat(new Date(event.date).getMonth() + 1)}
                    /
                    ${new Date(event.date).getFullYear()}
                    ` }}
                </h3>
                <p class="w-full">
                    {{ event.description.slice(0, 50)}}
                    <span class="text-colorSecondary block">
                        Mostrar Mais
                    </span>
                </p>
                <p class="mt-2 text-textMuted" v-if="type === 'event'">
                    {{ event.participants.length }} 
                    {{ event.participants.length == 1 ? 'Participante' : 'Participantes' }}
                </p>
            </div>
        </section>
    </Link>
</template>

<style scoped>

</style>