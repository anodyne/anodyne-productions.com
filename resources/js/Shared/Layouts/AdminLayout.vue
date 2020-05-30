<template>
    <div>
        <nav class="bg-white shadow mb-12">
            <div class="max-w-5xl mx-auto px-4 | sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a :href="$route('home')" class="flex-shrink-0 flex items-center">
                            <anodyne-mark class="hidden h-8 w-auto text-blue-500"></anodyne-mark>
                            <anodyne-logo class="block h-8 w-auto text-blue-500"></anodyne-logo>
                        </a>

                        <!-- Desktop header nav -->
                        <div class="hidden | sm:ml-6 sm:flex">
                            <inertia-link :href="$route('account.info')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Account
                            </inertia-link>
                            <a href="https://xtras.anodyne-productions.com" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Xtras
                            </a>
                            <a href="https://help.anodyne-productions.com" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Docs
                            </a>
                            <inertia-link :href="$route('admin.dashboard')" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
                                Admin
                            </inertia-link>
                        </div>
                    </div>

                    <!-- Notification button, hidden on mobile -->
                    <div class="hidden | sm:ml-6 sm:flex sm:items-center">
                        <!-- <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                />
                            </svg>
                        </button> -->

                        <dropdown placement="bottom-end" class="ml-3">
                            <avatar image-url="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" size="xs"></avatar>

                            <template #dropdown="{ toggle, styles }">
                                <a :href="$route('account.info')" :class="styles.link">Your Account</a>
                                <a href="#" :class="styles.link">Sign Out</a>
                            </template>
                        </dropdown>
                    </div>

                    <!-- Hamburger menu, hidden on desktop -->
                    <div class="-mr-2 flex items-center | sm:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="open = !open">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{ 'hidden': open, 'inline-flex': !open }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{ 'hidden': !open, 'inline-flex': open }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile nav -->
            <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
                <div class="pt-2 pb-3">
                    <inertia-link :href="$route('account.info')" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Account</inertia-link>
                    <a href="https://xtras.anodyne-productions.com" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Xtras</a>
                    <a href="https://help.anodyne-productions.com" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Docs</a>
                    <inertia-link :href="$route('admin.dashboard')" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-blue-500 text-base font-medium text-blue-700 bg-blue-50 focus:outline-none focus:text-blue-800 focus:bg-blue-100 focus:border-blue-700 transition duration-150 ease-in-out">Admin</inertia-link>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <avatar image-url="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" size="sm"></avatar>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-6 text-gray-800">{{ $page.auth.user.username }}</div>
                            <div class="text-sm font-medium leading-5 text-gray-500">{{ $page.auth.user.email }}</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <inertia-link :href="$route('account.info')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Your Account</inertia-link>
                        <a href="#" class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-5xl mx-auto | sm:px-6 lg:px-8">
            <div class="px-6 | md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                        {{ pageTitle }}
                    </h2>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <slot name="controls"></slot>
                </div>
            </div>

            <div class="bg-white shadow overflow-hidden mt-8 | sm:rounded-lg">
                <slot></slot>
            </div>

            <div class="text-sm text-gray-500 text-center my-8">
                &copy; 2020 Anodyne Productions. All rights reserved.
            </div>
        </div>
    </div>
</template>

<script>
import Avatar from '@/Shared/Avatar.vue';
import AnodyneLogo from '@/Shared/LogoAnodyne.vue';
import AnodyneMark from '@/Shared/MarkAnodyne.vue';

export default {
    name: 'AdminLayout',

    components: { Avatar, AnodyneLogo, AnodyneMark },

    props: {
        pageTitle: {
            type: String,
            required: true
        }
    },

    data () {
        return {
            open: false
        };
    },

    methods: {
        tabIconStyles (route) {
            return {
                'text-blue-500 group-hover:text-blue-500 group-focus:text-blue-600': this.$route().current(route),
                'text-gray-400 group-hover:text-gray-500 group-focus:text-gray-600': this.$route().current(route)
            };
        },

        tabStyles (route) {
            return {
                'border-blue-500 text-blue-600 focus:text-blue-800 focus:border-blue-700': this.$route().current(route),
                'border-transparent text-gray-500 focus:text-blue-800 focus:border-blue-700 hover:text-gray-700 hover:border-gray-300 focus:text-gray-700 focus:border-gray-300': !this.$route().current(route)
            };
        }
    }
};
</script>
