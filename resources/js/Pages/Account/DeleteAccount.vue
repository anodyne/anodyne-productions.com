<template>
    <account-layout>
        <form
            :action="$route('account.destroy')"
            method="POST"
            @submit.prevent="submit"
        >
            <div class="px-4 py-5 sm:p-6">
                <div v-if="$page.errors.length > 0">
                    Error
                </div>

                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Delete your account
                </h3>

                <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                    <p>
                        Once you delete your account, you will lose all data associated with it.
                    </p>
                </div>

                <div class="mt-10 rounded-md bg-gray-50 px-6 py-5">
                    <div>
                        <dl class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <div>
                                    <dt class="text-sm leading-6 font-medium text-gray-700">
                                        The following information will be deleted:
                                    </dt>
                                    <dd class="mt-5">
                                        <ul>
                                            <li>
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">User Info</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            Your basic user info such as username, email address, and any other profile data will be permanantly deleted from our system.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">Xtras</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            All of your mods and/or skins will be removed from AnodyneXtras and the files deleted from our servers. Be sure you have backups of your work.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">Email Notifications</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            All emails notifications you enrolled in will be stopped immediately.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <div>
                                    <dt class="text-sm leading-6 font-medium text-gray-700">
                                        The following information will <span class="font-bold text-gray-900 underline">NOT</span> be deleted:
                                    </dt>
                                    <dd class="mt-5">
                                        <ul>
                                            <li>
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">Comments</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            Any comments you've made on Xtras or help articles will remain, but personally identifiable information will be removed.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">Ratings</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            Ratings you've left for Xtras will remain, but any means of identifying you as the individual who left the rating will be removed.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                            <svg
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                class="w-6 h-6"
                                                            ><path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                                            /></svg>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="leading-6 font-medium text-gray-900">Forum Posts</h5>
                                                        <p class="mt-2 text-sm leading-5 text-gray-500">
                                                            Forum posts you've created will not be deleted. We currently do not have the ability to remove personally identifiable information from the forums database. We are working on possible solutions.
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-10">
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-50 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:bg-red-200 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Delete account
                    </button>
                </div>
            </div>
        </form>
    </account-layout>
</template>

<script>
import AccountLayout from '@/Shared/Layouts/AccountLayout.vue';

export default {
    name: 'DeleteAccount',

    components: { AccountLayout },

    methods: {
        submit () {
            this.$inertia.delete(this.$route('account.destroy'));
        }
    }
};
</script>
