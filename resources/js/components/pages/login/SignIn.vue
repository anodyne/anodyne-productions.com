<template>
    <login-layout :title="title">
        <h1 class="page-title">Sign In</h1>

        <form @submit.prevent="submit">
            <form-email
                v-model="form.email"
                field-id="email"
                name="email"
            ></form-email>

            <form-field
                field-id="password"
                name="password"
            >
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="key" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="field"
                        placeholder="Password"
                    >
                </div>
            </form-field>

            <div class="flex justify-between items-center">
                <button type="submit" class="button is-large is-primary">Sign In</button>

                <a :href="route('password.request')" class="text-base text-grey-500 font-medium no-underline hover:text-grey-600">Forgot Your Password?</a>
            </div>
        </form>
    </login-layout>
</template>

<script>
import axios from '@/util/axios';

export default {
    name: 'SignIn',

    data () {
        return {
            title: 'Sign In',
            form: {
                email: '',
                password: ''
            }
        };
    },

    methods: {
        submit () {
            axios.post(route('login'), this.form)
                .then((response) => {
                    Turbolinks.visit(route('home'));
                })
                .catch(({ error }) => {
                    console.log('Error');
                });
        }
    }
};
</script>
