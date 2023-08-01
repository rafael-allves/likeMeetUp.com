<script setup>
    
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        content:{
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
    :href="`/${type}/${content.id}`"
    >
        <section class="block md:flex gap-1 mb-2 md:px-10">
            <div class="w-[30%] max-w-[300px] min-w-[200px]">
                <img :src="'/' + content.image" alt="Foto do contento">
            </div>
            <div class="px-3 py-3 md:px-10 shadow-md w-full">
                <h2 class="text-lg">
                    {{ content.title.slice(0, 22) }}
                    <span v-if="content.title.length > 22">
                        ...
                    </span>
                </h2>
                <h3 class="text-textMuted font-bold" v-if="type === 'events'">
                    {{
                        `
                        ${ new Date(content.date).getDate().toString().length != 1 ? 
                            new Date(content.date).getDate() :
                            '0'.concat(new Date(content.date).getDay().toString()) }
                        /
                        ${(new Date(content.date).getMonth() + 1).toString().length != 1 ?
                            new Date(content.date).getMonth() + 1 :
                            '0'.concat(new Date(content.date).getMonth() + 1)}
                        /
                        ${new Date(content.date).getFullYear()}
                        `
                    }}
                </h3>
                <p class="w-full">
                    {{ content.description.slice(0, 50)}}
                    <span class="text-colorSecondary block">
                        Mostrar Mais
                    </span>
                </p>
                <p class="mt-2 text-textMuted" v-if="type === 'events'">
                    {{ content.participants.length }} 
                    {{ content.participants.length == 1 ? 'Participante' : 'Participantes' }}
                </p>
            </div>
        </section>
    </Link>
</template>