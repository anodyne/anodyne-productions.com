<template>
    <account-layout>
        <form
            :action="$route('account.info.update')"
            method="POST"
            @submit.prevent="submit"
        >
            <div class="p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Info</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            This information is never displayed publicly and only viewable by Anodyne admins.
                        </p>
                    </div>
                    <div class="mt-5 | md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                                    Name
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="Tom Cook"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-3 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                                    Email address
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="tom@banana.com"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 mt-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            This information will be displayed publicly so be careful what you share.
                        </p>
                    </div>
                    <div class="mt-5 | md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="username" class="block text-sm font-medium leading-5 text-gray-700">
                                    Username
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="username"
                                        v-model="form.username"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="tomcook"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="about" class="block text-sm leading-5 font-medium text-gray-700">
                                About
                            </label>
                            <div class="rounded-md shadow-sm">
                                <textarea
                                    id="about"
                                    v-model="form.bio"
                                    rows="3"
                                    class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="Tell folks a little about yourself"
                                ></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Brief description for your profile.
                            </p>
                        </div>

                        <div class="mt-6">
                            <label for="photo" class="block text-sm leading-5 font-medium text-gray-700">
                                Photo
                            </label>
                            <div class="mt-2 flex items-center">
                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    <svg
                                        class="h-full w-full text-gray-300"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                                <span class="ml-5 rounded-md shadow-sm">
                                    <button type="button" class="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                        Change
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 py-5 border-t border-gray-200 mt-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Social Media</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            Let users know how to get in touch with you on social media.
                        </p>
                    </div>
                    <div class="mt-5 | md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="twitter" class="block text-sm font-medium leading-5 text-gray-700">
                                    Twitter
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 | sm:text-sm sm:leading-5">
                                            @
                                        </span>
                                    </div>
                                    <input
                                        id="twitter"
                                        v-model="form.twitter"
                                        class="form-input block w-full pl-8 sm:pl-7 sm:text-sm sm:leading-5"
                                        placeholder="tcook"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="facebook" class="block text-sm font-medium leading-5 text-gray-700">
                                    Facebook
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="facebook"
                                        v-model="form.facebook"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="https://facebook.com/tomcook"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="discord" class="block text-sm font-medium leading-5 text-gray-700">
                                    Discord
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="discord"
                                        v-model="form.discord"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="@TCook#0001"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-4 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="google" class="block text-sm font-medium leading-5 text-gray-700">
                                    Google
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="google"
                                        v-model="form.google"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="tomcook"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-3 gap-6">
                            <div class="col-span-3 | sm:col-span-2">
                                <label for="url" class="block text-sm font-medium leading-5 text-gray-700">
                                    Personal Site
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input
                                        id="url"
                                        v-model="form.url"
                                        class="form-input flex-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                        placeholder="https://banana.com"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right | sm:px-6">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium uppercase tracking-wide rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </form>
    </account-layout>
</template>

<script>
import AccountLayout from '@/Shared/Layouts/AccountLayout.vue';

export default {
    name: 'BasicInfo',

    components: { AccountLayout },

    props: {
        user: {
            type: Object,
            required: true
        }
    },

    data () {
        return {
            form: {
                name: this.user.name,
                username: this.user.username,
                email: this.user.email,
                bio: this.user.bio,
                twitter: this.user.twitter,
                facebook: this.user.facebook,
                google: this.user.google,
                url: this.user.url
            }
        };
    },

    methods: {
        submit () {
            this.$inertia.put(this.$route('account.info.update'), this.form);
        }
    }
};
</script>
