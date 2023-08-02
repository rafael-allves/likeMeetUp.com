<script setup>
    const props = defineProps({
        publications: {
            type: Array,
            required: true,
        }
    })

    import Publication from '@/Components/publications/Publication.vue';

</script>

<template>
    <section class="w-full">
        <section class="w-full flex flex-col items-center gap-5">
            <div v-for="publication in props.publications"
            class="min-w-[300px] bg-white w-full max-w-[500px]">
                <Publication :publication="publication"
                />
            </div>
        </section>
    </section>
</template>