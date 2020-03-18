<template>
    <login-layout :title="title">
        <h1 class="page-title">Reset Password</h1>

        <form @submit.prevent="submit">
            <input
                type="hidden"
                name="token"
                :value="token"
            >

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
                        placeholder="Your email address"
                    >
                </div>
            </form-field>

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
                        placeholder="New password"
                    >
                </div>
            </form-field>

            <form-field
                field-id="password-confirm"
                name="password-confirm"
            >
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="key" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="password-confirm"
                        v-model="form.password_confirm"
                        type="password"
                        class="field"
                        placeholder="Confirm password"
                    >
                </div>
            </form-field>

            <div class="flex justify-between items-center">
                <button type="submit" class="button is-large is-primary">Reset Password</button>

                <a :href="route('login')" class="text-base font-medium text-grey-500 no-underline hover:text-grey-600">Cancel</a>
            </div>
        </form>
    </login-layout>
</template>

<script>
import axios from '@/util/axios';

export default {
    name: 'ResetPassword',

    props: {
        email: {
            type: String,
            required: true
        },
        token: {
            type: String,
            required: true
        }
    },

    data () {
        return {
            title: 'Reset Password',
            form: {
                email: this.email,
                password: '',
                password_confirm: ''
            }
        };
    },

    methods: {
        submit () {
            axios.post(route('password.update'), this.form)
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
