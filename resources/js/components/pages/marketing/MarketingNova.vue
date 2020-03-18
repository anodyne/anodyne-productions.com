<template>
    <marketing-layout :title="title">
        <section class="py-6">
            <div class="container">
                <div class="text-center">
                    <div class="text-green-500 text-4xl font-bold">Nova 2</div>
                    <div class="mb-6 text-grey-400 text-xl font-medium">Sub-headline with some supporting text here.</div>
                </div>

                <div class="flex">
                    <div class="flex-1">
                        <div class="inline-flex p-3 rounded-full bg-green-50 text-green-500 mb-2">
                            <app-icon name="user" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-xl font-medium text-green-500 mb-2">Feature 1</div>

                        <div class="text-lg leading-normal text-grey-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                    </div>

                    <div class="flex-1 mx-10">
                        <div class="inline-flex p-3 rounded-full bg-green-50 text-green-500 mb-2">
                            <app-icon name="lock-unlock" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-xl font-medium text-green-500 mb-2">Feature 1</div>

                        <div class="text-lg leading-normal text-grey-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="inline-flex p-3 rounded-full bg-green-50 text-green-500 mb-2">
                            <app-icon name="settings-slider" class="h-6 w-6"></app-icon>
                        </div>

                        <div class="text-xl font-medium text-green-500 mb-2">Feature 1</div>

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
    name: 'MarketingNova',

    data () {
        return {
            title: 'Nova'
        };
    }
};
</script>
