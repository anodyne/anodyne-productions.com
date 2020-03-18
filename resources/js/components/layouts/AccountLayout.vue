<template>
    <base-layout :title="title">
        <div class="container">
            <div class="flex mb-12">
                <nav class="w-64 mr-8">
                    <a :href="route('account.info')" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600">
                        <app-icon name="user" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
                        My Info
                    </a>

                    <a :href="route('account.preferences')" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600">
                        <app-icon name="settings-slider" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
                        Preferences
                    </a>

                    <a :href="route('account.notifications')" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600">
                        <app-icon name="notification" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
                        Notifications
                    </a>

                    <a :href="route('account.delete')" class="group flex items-center w-full p-3 rounded leading-none no-underline text-red-500 font-medium mb-4 border border-transparent transition hover:text-red-600">
                        <app-icon name="trash" class="h-5 w-5 mr-3 text-red-400 group-hover:text-red-500"></app-icon>
                        Delete My Account
                    </a>
                </nav>

                <main class="flex-1 bg-white border p-6 rounded">
                    <slot></slot>
                </main>
            </div>
        </div>
    </base-layout>
</template>

<script>
import HasPageTitle from '@/mixins/HasPageTitle';

export default {
    name: 'AccountLayout',

    mixins: [HasPageTitle]
};
</script>
