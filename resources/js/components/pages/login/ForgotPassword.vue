<template>
    <login-layout :title="title">
        <h1 class="page-title">Reset Password</h1>

        <p class="mb-10 text-grey-500">Don&rsquo;t worry, it happens to the best of us. Send yourself a password reset link to change your password if you&rsquo;ve forgotten it.</p>

        <form @submit.prevent="submit">
            <form-field
                field-id="email"
                name="email"
            >
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="email" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="field"
                        placeholder="Email address"
                    >
                </div>
            </form-field>

            <div class="flex justify-between items-center">
                <button type="submit" class="button is-large is-primary">Send Password Reset Link</button>

                <a :href="route('login')" class="text-base font-medium text-grey-500 no-underline hover:text-grey-600">Cancel</a>
            </div>
        </form>
    </login-layout>
</template>

<script>
import axios from '@/util/axios';

export default {
    name: 'ForgotPassword',

    data () {
        return {
            title: 'Forgot Your Password?',
            form: {
                email: ''
            }
        };
    },

    methods: {
        submit () {
            axios.post(route('password.email'), this.form)
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
