<script setup>
    import { Link } from '@inertiajs/vue3';

    import ProfilePic from '@/Components/ProfilePic.vue';

    const props = defineProps({ 
        publication: {
            type: Object,
            required: true,
        }
    });

    const owner = props.publication.owner;

    const lines = props.publication.content.split('\n');

</script>

<template>
    <section class="flex flex-col min-h-[400px] shadow shadow-black py-2 rounded">
        <Link
        :href="`users/${owner.id}`" 
        >
            <section class="px-10">
                <div class="flex items-center gap-2 mb-2 border-b-[3px] border-gray-100">
                    <div class="w-[40px] h-[40px]">
                        <ProfilePic 
                        :profilePic="owner.profile_pic"
                        />
                    </div>
                    <div>
                        <h2 class="font-bold text-md text-textMuted">
                            {{ 
                                owner.name
                            }}
                        </h2>
                    </div>
                </div>
            </section>
        </Link>

        <section v-if="publication.image != null"
        class="w-full flex items-center justify-center">
            <div class="w-full max-w-[500px] px-4">
                <div class="w-full flex items-center justify-center">
                    <img :src="props.publication.image"  
                    class="w-full object-fill"
                    />
                </div>
            </div>
        </section>
        <section class="w-full px-10 mt-5">
            <div class="w-full flex justify-center">
                <h2 class="text-lg text-center font-bold">
                    {{ 
                        publication.title     
                    }}
                </h2>
            </div>
            <p v-for="line in lines"
            class="break-words">
                {{ 
                    line                         
                }}
            </p>
        </section>
    </section>
</template>

<style scoped>
    img{
        aspect-ratio: 4 / 3;
    }
</style>