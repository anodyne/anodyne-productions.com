<template>
    <admin-layout page-title="Users">
        <template #controls>
            <span class="shadow-sm rounded-md">
                <inertia-link :href="$route('admin.users.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700 transition duration-150 ease-in-out">
                    Create
                </inertia-link>
            </span>
        </template>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Users
                        </h3>
                    </div>
                    <div class="ml-4 mt-2 flex-shrink-0">
                        <span class="inline-flex rounded-md shadow-sm">
                            <inertia-link :href="$route('admin.users.create')" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-semibold rounded-md text-white uppercase tracking-wide bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700">
                                Create user
                            </inertia-link>
                        </span>
                    </div>
                </div>
            </div>

            <ul>
                <li
                    v-for="user in users.data"
                    :key="user.id"
                    class="border-t border-gray-200 first:border-0"
                >
                    <inertia-link :href="$route('admin.users.edit', { user })" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="min-w-0 flex-1 flex items-center">
                                <div class="flex-shrink-0">
                                    <avatar image-url="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" size="lg"></avatar>
                                </div>
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <div class="text-sm leading-5 font-medium text-blue-600 truncate">{{ user.name }}</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            ><path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd"
                                            /></svg>
                                            <span class="truncate">{{ user.username }}</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            <span class="truncate">{{ user.email }}</span>
                                        </div>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <div class="text-sm leading-5 text-gray-900">
                                                Applied on
                                                <time datetime="2020-01-07">January 7, 2020</time>
                                            </div>
                                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                <svg
                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                                Completed phone screening
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <svg
                                    class="h-5 w-5 text-gray-400"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                        </div>
                    </inertia-link>
                </li>
            </ul>
        </div>
    </admin-layout>
</template>

<script>
import Avatar from '@/Shared/Avatar.vue';
import AdminLayout from '@/Shared/Layouts/AdminLayout.vue';

export default {
    components: { Avatar, AdminLayout },

    props: {
        filters: {
            type: Object,
            required: true
        },
        users: {
            type: Object,
            required: true
        }
    }
};
</script>
