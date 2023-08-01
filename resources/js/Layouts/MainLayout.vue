<script setup>
    import { ref } from 'vue';
    import {Head} from '@inertiajs/vue3';

    import Navbar from '@/Components/Navbar.vue';
    import NewPublication from '@/Components/NewPublication.vue';

    const props = defineProps({
        authStatus:{
            type: Boolean,
            required: true,
        },
        user:{
            type: Object,
            required: true,
        },
        status:{
            type: Object,
        }
    });

    const urlHash = ref(window.location.hash);
</script>

<template>
    <div class="relative" id="layout">
        <Head>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        </Head>
        <div class="pb-20">
            <Navbar 
                :authStatus="props.authStatus"
                :user="props.user"
            />

            <NewPublication v-if="urlHash == '#newPublication'" />

            <div v-if="props.status != undefined" class="relative">
                <p v-if="props.status.error != undefined"
                class="text-red-950 bg-red-400 w-full text-center absolute z-40">
                    {{ props.status.error }}
                </p>
                <p v-if="props.status.okay != undefined"
                class="text-green-950 bg-green-600 w-full text-center absolute z-40">
                    {{ props.status.okay }}
                </p>
            </div>
            <slot />
        </div>

        <footer class="flex items-center absolute left-0 bottom-0 justify-center w-full bg-black h-20 text-rose-50">
            Rafa Events
            &copy; 2023
        </footer>
    </div>
</template>

<style scoped>
    #layout{
        min-height: 100vh;
    }
</style>