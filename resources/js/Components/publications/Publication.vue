<script setup>
    import {ref} from 'vue';

    import { Link } from '@inertiajs/vue3';

    import ProfilePic from '@/Components/ProfilePic.vue';

    const props = defineProps({ 
        user: {
            type: Object,
            required: true,
        },

        publication: {
            type: Object,
            required: true,
        }
    });
</script>

<template>
    <section class="flex flex-col">
        <Link
        :href="`users/${user.id}`" 
        class="flex items-center gap-2">
            <div class="w-[40px]">
                <ProfilePic 
                :profilePic="user.profile_pic"
                />
            </div>
            <div>
                <h2 class="font-bold text-xl">
                    {{ 
                        props.user.name    
                    }}
                </h2>
            </div>
        </Link>
    </section>
</template>