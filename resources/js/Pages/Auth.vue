<script setup>
    import {ref} from 'vue'

    import Layout from '../Layouts/mainLayout.vue';
    import {Head} from '@inertiajs/vue3'
    
    import '/public/css/auth/styles.css';

    import Logo from '/public/assets/logo.png'

    import login from '../functions/auth/login.js'
    import register from '../functions/auth/register.js'
    import toggleShowPass from '../functions/auth/toggleShowPass'
    import inputListener from '../functions/auth/inputListener'

    const props = defineProps({
        user:{
            type: Object,
            required: true,
        }
    })

    const controler = {
        type: ref('login'),
        login: {
            email: false,
            password: false
        },
        register: {
            username: false,
            email: false,
            password: false,
            confirmpassword: false,
        }
    }
    const toggleAuth = ref('Login');

</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    
    >
        <main>
            <Head>
                <title>
                    Auth
                </title>
            </Head>
            <section class="main__container">
                    <header class="main__container__header">
                        <h2 class="main__container__header_h2">
                            <img :src=Logo width="40px" height="40px" alt="Rafa Events" />
                            Rafa Events
                        </h2>

                        <h1 class="main__container__header_h1">
                            Bem-vindo
                        </h1>

                        <small>Por Favor, Informe suas credenciais</small>
                    </header>
                    <section>
                        <section class="main__container__form__section">
                            <div class="main__container__form__section_authtype">
                                <button
                                type="button"
                                id="login"
                                @click="controler.type = 'login'; toggleAuth = 'Login'">
                                    Login
                                </button>
                            </div>
                            <span :class="toggleAuth">
                                {{ toggleAuth }}
                            </span>
                            <div class="main__container__form__section_authtype">
                                <button
                                type="button"
                                @click="controler.type = 'register'; toggleAuth = 'Register'"
                                >
                                    Register
                                </button>
                            </div>
                        </section>
                        <section>
                            <form id="loginform" class="auth" method="POST" v-if="controler.type == 'login'">
                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        mail
                                    </span>
                                    <div class="input__text">
                                        <label for="loginemail">Email</label>
                                        <input type="email" name="loginemail" id="loginemail" class="input__camp_input" required maxlength="64"
                                        @input="inputListener($event, controler)">
                                        <span class="material-symbols-outlined">

                                        </span>
                                    </div>
                                 </div>
                                <p class="errorMessage">
                                </p>
                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        lock
                                    </span>
                                    <div class="input__text">
                                        <label for="loginpassword">Senha</label>
                                        <input type="password" name="loginpassword" id="loginpassword" class="input__camp_input" required minlength="8"
                                        @input="inputListener($event, controler)">
                                        <button 
                                        class="showpassbtn" 
                                        type="button" 
                                        @click.prevent="toggleShowPass">
                                            <span class="material-symbols-outlined">
                                                visibility_off
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <p class="errorMessage"></p>
                                <button id="formLogin" 
                                class="authButton" 
                                type="submit"
                                @click.prevent="login(controler.register)"
                                >
                                    LOGIN
                                </button>

                            </form>
                            <form class="auth" id="registerform" method="POST" v-else>
                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        person
                                    </span>
                                    <div class="input__text">
                                        <label for="registerusername">Nome</label>
                                        <input type="username" name="registerusername" id="registerusername" class="input__camp_input" required minlength="4"
                                        @input="inputListener($event, controler)">
                                        <span class="material-symbols-outlined">

                                        </span>
                                    </div>
                                </div>
                                <p class="errorMessage"></p>
                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        mail
                                    </span>
                                    <div class="input__text">
                                        <label for="registeremail">Email</label>
                                        <input type="email" name="registeremail" id="registeremail" class="input__camp_input" required maxlength="64"
                                        @input="inputListener($event, controler)">
                                        <span class="material-symbols-outlined">

                                        </span>
                                    </div>
                                </div>
                                <p class="errorMessage"></p>
                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        lock
                                    </span>
                                    <div class="input__text">
                                        <label for="registerpassword">Senha</label>
                                        <input type="password" name="registerpassword" id="registerpassword" class="input__camp_input" required minlength="8"
                                        @input="inputListener($event, controler)">
                                        <button 
                                        class="showpassbtn" 
                                        type="button" 
                                        @click.prevent="toggleShowPass">
                                            <span class="material-symbols-outlined">
                                                visibility_off
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <p class="errorMessage"></p>

                                <div class="input__camp">
                                    <span class="material-symbols-outlined input__camp_icon">
                                        lock
                                    </span>
                                    <div class="input__text">
                                        <label for="confirmpassword">Confirmar Senha</label>
                                        <input type="password" name="confirmpassword" id="confirmpassword" class="input__camp_input" required
                                        @input="inputListener($event, controler)">
                                        <button 
                                        class="showpassbtn" 
                                        type="button" 
                                        @click.prevent="toggleShowPass">
                                            <span class="material-symbols-outlined">
                                                visibility_off
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <p class="errorMessage"></p>

                                <button id="formRegister"
                                class="authButton"
                                type="submit"
                                @click.prevent="register(controler.register)"
                                >
                                    REGISTER
                                </button>
                            </form>
                        </section>
                    </section>
            </section>
        </main>
    </Layout>
</template>

<style>
</style>