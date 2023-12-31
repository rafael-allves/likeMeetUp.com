<script setup>
    import {ref, watch} from 'vue'

    import Layout from '@/Layouts/MainLayout.vue';
    import SetAuthType from '@/Components/SetAuthType.vue';
    import InputCamp from '@/Components/InputCamp.vue';
    import InputError from '@/Components/InputError.vue';
    import CheckBox from '@/Components/CheckBox.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    import { Head, useForm } from '@inertiajs/vue3';

    import Logo from '/public/assets/logo.png';

    const props = defineProps({
        user:{
            type: Object,
            required: true,
        }
    })

    const authType = ref('Login');

    const formLogin = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const formRegister = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const login = () => {
        formLogin.post(route('login'), {
            onFinish: () =>formLogin.reset('password'),
        });
    };

    const register = () => {
        formRegister.post(route('register'), {
            onFinish: () => formRegister.reset('password', 'password_confirmation'),
        });
    };

    const resetForm = () => {
        formLogin.reset('email', 'password');
        formRegister.reset('name', 'email', 'password', 'password_confirmation');
    }
    
    watch(authType, resetForm);

</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    :status="props.status"
    >
        <main>
            <Head>
                <title>
                    Auth
                </title>
            </Head>
            <section class="flex flex-col items-center mt-10">
                    <header class="flex flex-col gap-2">
                        <h2 class="text-center text-3xl flex items-center justify-center gap-1">
                            <img width="40" height="40" :src=Logo alt="Logo">
                            Rafa Events
                        </h2>

                        <h1 class="text-3xl text-center">
                            Bem-vindo
                        </h1>

                        <small class="text-textMuted text-base">
                            Por Favor, Informe suas credenciais
                        </small>
                    </header>
                    <section>
                        <section class="flex items-center my-3">
                            <SetAuthType :toggleAuth="authType" @toggleAuth="(type) => authType = type" />
                        </section>
                        <section>
                            <form id="loginform" class="auth" method="POST" v-if="authType === 'Login'"
                            @submit.prevent="login">
                                <InputCamp
                                    id="email"
                                    type="email"
                                    class="mt-1 block"
                                    v-model="formLogin.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    />
                                <InputError class="mt-2" :message="formLogin.errors.email" />

                                <div class="mt-4">
                                    <InputCamp
                                        id="password"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="formLogin.password"
                                        required
                                        autocomplete="current-password"
                                    />
                                    <InputError class="mt-2" :message="formLogin.errors.password" />
                                </div>

                                <div class="block mt-4">
                                    <label class="flex items-center">
                                        <CheckBox 
                                        v-model="formLogin.remember"
                                        :checked="formLogin.remember"
                                        />
                                        <span class="ml-2 text-sm text-textColor">Lembrar de Mim</span>
                                    </label>
                                </div>

                                <PrimaryButton>
                                    LOGIN
                                </PrimaryButton>

                            </form>
                            <form class="auth" id="registerform" method="POST" v-else
                            @submit.prevent="register()">
                                <div>
                                    <InputCamp
                                        id="name"
                                        type="name"
                                        v-model="formRegister.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                    />

                                    <InputError class="mt-2" :message="formRegister.errors.name" />
                                </div>

                                <div class="mt-4">
                                    <InputCamp
                                        id="email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        v-model="formRegister.email"
                                        required
                                        autocomplete="username"
                                    />

                                    <InputError class="mt-2" :message="formRegister.errors.email" />
                                </div>

                                <div class="mt-4">
                                    <InputCamp
                                        id="password"
                                        type="password"
                                        class="mt-1 block w-full"
                                        v-model="formRegister.password"
                                        required
                                        autocomplete="new-password"
                                    />

                                    <InputError class="mt-2" :message="formRegister.errors.password" />
                                </div>

                                <div class="mt-4">
                                    <InputCamp
                                        id="password_confirmation"
                                        type="confirmar senha"
                                        class="mt-1 block w-full"
                                        v-model="formRegister.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />

                                    <InputError class="mt-2" :message="formRegister.errors.password_confirmation" />
                                </div>
                                <PrimaryButton>
                                    REGISTER
                                </PrimaryButton>
                            </form>
                        </section>
                    </section>
            </section>
        </main>
    </Layout>
</template>