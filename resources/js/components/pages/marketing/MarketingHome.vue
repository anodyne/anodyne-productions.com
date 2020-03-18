<template>
    <marketing-layout :title="title">
        <section class="py-6">
            <div class="container flex">
                <div class="w-1/2">
                    <h1 class="text-4xl text-blue-500">Say Hello to Nova 2.6</h1>
                    <h3 class="font-normal text-grey-600">Better than 2.5, we promise.</h3>

                    <a href="#" class="button is-secondary mt-6">Download Now</a>
                </div>
                <div class="w-1/2">
                    Image
                </div>
            </div>
        </section>

        <section class="py-6 bg-grey-100">
            <div class="container">
                <div class="text-center mb-12">
                    <div class="text-blue-500 text-3xl font-bold">Headline</div>
                    <div class="text-grey-400 text-xl font-medium">Sub-headline with some supporting text here.</div>
                </div>

                <div class="flex">
                    <div class="flex-1">
                        <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-3">
                            <app-icon name="key" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-2xl font-medium text-blue-500 mb-2">Feature 1</div>

                        <div class="text-lg leading-normal text-grey-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                    </div>

                    <div class="flex-1 mx-10">
                        <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-3">
                            <app-icon name="lock" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-2xl font-medium text-blue-500 mb-2">Feature 2</div>

                        <div class="text-lg leading-normal text-grey-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-3">
                            <app-icon name="notification" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-2xl font-medium text-blue-500 mb-2">Feature 3</div>

                        <div class="text-lg leading-normal text-grey-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </marketing-layout>
</template>

<script>
export default {
    name: 'MarketingHome',

    data () {
        return {
            title: 'Home'
        };
    }
};
</script>
