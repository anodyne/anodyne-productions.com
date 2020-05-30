<template>
    <admin-layout page-title="Admin Dashboard">
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Admin Dashboard
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from '@/Shared/Layouts/AdminLayout.vue';

export default {
    components: { AdminLayout }
};
</script>
