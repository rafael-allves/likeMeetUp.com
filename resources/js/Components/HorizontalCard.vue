<script setup>
    import { Link } from '@inertiajs/vue3';
    const props = defineProps({
        content: {
            type: Object,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        owner: {
            type: Boolean,
            default: false,
        }
    })

</script>

<template>
    <Link
    :href="`/${type}/${content.id}`"
    class="px-1 py-1 block w-full h-full"
    >
        <section class="h-full relative grid grid-cols-1">
            <section>
                <div class="max-w-full">
                    <img :src="'/' + content.image" alt="Image" />
                </div>
                <div class="pl-3 mt-2">
                    <h2 class="mb-2 font-bold">
                        {{ content.title.slice(0, 22) }}
                        <span v-if="content.title.length > 22"
                        class="text-colorSecondary">
                            ...
                        </span>
                    </h2>
                    <h3 class="text-textMuted font-bold mb-2" v-if="type === 'events'">
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

                    <p>
                        {{ content.description.slice(0, 50) }}
                        <span v-if="content.description.length > 50"
                        class="text-colorSecondary">
                            ...
                        </span>
                    </p>
                </div>
            </section>
            <div v-if="props.owner" class="flex items-end justify-end mt-2">
                <h3
                class="flex items-center">
                    <span class="material-symbols-outlined text-yellow-600">
                        star
                    </span>
                    Dono 
                </h3>
            </div>
            <div v-if="$slots">
                <slot />
            </div>
        </section>
    </Link>
</template>