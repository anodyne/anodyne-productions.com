<template>
    <login-layout :title="title">
        <h1 class="page-title">Register</h1>

        <p class="text-grey-500 mb-10">Everyone hates having tons of account for different services, so we wanted to do our part to help alleviate the problem. The AnodyneID gives you access to the growing array of services and sites offered by Anodyne Productions. Currently, you can use your AnodyneID to manage your profile and use the AnodyneXtras services. In the future, you'll be able to use your AnodyneID for additional services and sites that we open.</p>

        <form>
            <form-field field-id="email" name="email">
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="email" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        name="email"
                        placeholder="Your email address"
                        class="field"
                    >
                </div>
            </form-field>

            <form-field field-id="email-confirm" name="email-confirm">
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="email" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="email-confirm"
                        v-model="form.email_confirm"
                        type="email"
                        name="email-confirm"
                        placeholder="Confirm your email address"
                        class="field"
                    >
                </div>
            </form-field>

            <form-field field-id="username" name="username">
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="user" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="username"
                        v-model="form.username"
                        type="text"
                        name="username"
                        placeholder="Pick your username"
                        class="field"
                    >
                </div>
            </form-field>

            <form-field field-id="password" name="password">
                <div class="field-group">
                    <div class="field-addon">
                        <app-icon name="key" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
                    </div>

                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        name="password"
                        placeholder="Set your password"
                        class="field"
                    >
                </div>
            </form-field>

            <div class="flex justify-between items-center">
                <button type="submit" class="button is-large is-primary">Register</button>
            </div>
        </form>
    </login-layout>
</template>

<script>
import axios from '@/util/axios';

export default {
    name: 'RegisterAccount',

    data () {
        return {
            title: 'Register Account',
            form: {
                email: '',
                email_confirm: '',
                username: '',
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
