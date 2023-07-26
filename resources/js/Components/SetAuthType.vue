<script setup>
    const props = defineProps({
        toggleAuth: {
            type: String,
            required: true,
        }
    })

    defineEmits(['toggleAuth']);
</script>

<template>
    <section class="flex items-center my-3 rounded-lg h-8 relative bg-secondBg w-full">
        <div class="relative flex items-center justify-center w-[50%] h-full">
                    <button
                    type="button"
                    id="login"
                    @click="$emit('toggleAuth', $event.target.innerText); toggleAuth = 'Login'">
                        Login
                    </button>
                </div>
                <span :class="toggleAuth"
                class="rounded border-transparent absolute z-10 color-white font-bold flex items-center justify-center bg-white transition-all duration-500">
                    {{ toggleAuth }}
                </span>
                <div class="relative flex items-center justify-center w-[50%] h-full">
                    <button
                    type="button"
                    @click="$emit('toggleAuth', $event.target.innerText); toggleAuth = 'Register'"
                    class="absolute z-0"
                    >
                        Register
                    </button>
            </div>
    </section>
</template>

<style scoped>
    button{
        width: calc(100% - 0.5rem);
        height: calc(100% - 0.5rem);

        display: flex;
        justify-content: center;
        align-items: center;

        border-radius: 0.6rem;
        border: none;

        cursor: pointer;

        color: black;
    }

    span{
        width: calc(50% - 0.3rem);
        height: calc(100% - 0.3rem);
        
        color: black;
    }
    .Login{
        left: 0.3rem;
    }
    .Register{
        left: 50%;
    }
</style>