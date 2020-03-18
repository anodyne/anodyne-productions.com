<template>
    <div class="flex flex-col justify-around h-screen">
        <div class="w-128 mx-auto">
            <a :href="route('home')" class="flex justify-center mb-12 no-underline text-blue-500 transition hover:text-blue-600">
                <anodyne-logo
                    :with-text="true"
                    :lg="true"
                ></anodyne-logo>
            </a>

            <div class="bg-white rounded py-10 px-6 shadow-lg">
                <slot></slot>
            </div>

            <div class="mt-12 text-center text-base text-grey-300">
                &copy; 2019 Anodyne Productions
            </div>
        </div>
    </div>
</template>

<script>
import HasPageTitle from '@/mixins/HasPageTitle';
import UpdatesPageTitle from '@/mixins/UpdatesPageTitle';

export default {
    name: 'LoginLayout',

    mixins: [HasPageTitle, UpdatesPageTitle]
};
</script>
