<template>
    <div class="flex flex-col justify-between h-screen">
        <div>
            <nav class="flex items-center relative z-10 py-6 mb-12">
                <div class="container">
                    <div class="flex items-center justify-between">
                        <div class="flex-shrink">
                            <anodyne-logo
                                class="text-blue-500"
                                :with-text="true"
                                :md="true"
                            ></anodyne-logo>
                        </div>

                        <a :href="route('login')" class="button is-primary">
                            Sign In
                        </a>
                    </div>
                </div>
            </nav>

            <slot></slot>
        </div>

        <footer class="bg-grey-800 text-grey-400 py-12">
            <div class="container">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                        <div class="text-2xl font-thin text-grey-200 mb-6">
                            <anodyne-logo :with-text="true" :md="true"></anodyne-logo>
                        </div>

                        <div class="flex items-center">
                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-facebook" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-twitter" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="email" class="h-6 w-6"></app-icon>
                            </a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-bold mb-3">About Us</div>

                            <a :href="route('home')" class="block mb-1 text-grey-600 hover:text-grey-400 no-underline">
                                Home
                            </a>
                            <a
                                href="https://discuss.anodyne-productions.com"
                                target="_blank"
                                class="block mb-1 text-grey-600 hover:text-grey-400 no-underline"
                            >
                                Discussions
                            </a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-bold mb-3">Nova</div>

                            <a :href="route('nova')" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">Download</a>
                            <a href="#/nova-nextgen" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">Nova NextGen</a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-bold mb-3">Products</div>

                            <a
                                href="https://xtras.anodyne-productions.com"
                                target="_blank"
                                class="block text-grey-500 hover:text-grey-400 mb-1 no-underline"
                            >AnodyneXtras</a>
                            <a
                                href="https://help.anodyne-productions.com"
                                target="_blank"
                                class="block text-grey-500 hover:text-grey-400 mb-1 no-underline"
                            >Help Center</a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between border-t border-grey-800 mt-6 pt-6 text-sm text-grey-500 leading-normal">
                    <div>&copy; 2019 Anodyne Productions. All rights reserved.</div>

                    <div class="flex justify-start md:justify-end">
                        <a href="#/privacy-policy" class="mr-6 text-grey-500 hover:text-grey-400 no-underline">
                            Privacy Policy
                        </a>
                        <a href="#/terms-of-use" class="text-grey-500 hover:text-grey-400 no-underline">
                            Terms of Use
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import HasPageTitle from '@/mixins/HasPageTitle';
import UpdatesPageTitle from '@/mixins/UpdatesPageTitle';

export default {
    name: 'BaseLayout',

    mixins: [HasPageTitle, UpdatesPageTitle]
};
</script>
