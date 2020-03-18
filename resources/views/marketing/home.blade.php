@extends('layouts.marketing')

@section('title', 'Home')

@section('content')
    <section class="py-6">
        <div class="container">
            <div class="text-center">
                <div class="text-blue-500 text-4xl font-bold">Headline</div>
                <div class="mb-6 text-grey-400 text-xl font-medium">Sub-headline with some supporting text here.</div>
            </div>

            <div class="flex">
                <div class="flex-1">
                    <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-2">
                        <app-icon name="login-key" class="h-6 w-6"></app-icon>
                    </div>

                    <div class="text-xl font-medium text-blue-500 mb-2">Feature 1</div>

                    <div class="text-lg leading-normal text-grey-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>

                <div class="flex-1 mx-10">
                    <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-2">
                        <app-icon name="login-key" class="h-6 w-6"></app-icon>
                    </div>

                    <div class="text-xl font-medium text-blue-500 mb-2">Feature 1</div>

                    <div class="text-lg leading-normal text-grey-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>

                <div class="flex-1">
                    <div class="inline-flex p-3 rounded-full bg-blue-50 text-blue-500 mb-2">
                        <app-icon name="login-key" class="h-6 w-6"></app-icon>
                    </div>

                    <div class="text-xl font-medium text-blue-500 mb-2">Feature 1</div>

                    <div class="text-lg leading-normal text-grey-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container">
        <p class="mb-8">Founded in 2005, Anodyne Productions was the definition of the the idiom "necessity is the mother of invention." Born out of a need for an easy-to-use and powerful tool to manage online RPGs, Anodyne Productions opened its doors with the SIMM Management System (SMS), a tool to help game masters spend less time managing the game and more time playing it. Over the last 13 years, Anodyne has delivered premier RPG management tools, first for Star Trek RPGs with SMS, and now for RPGs of all kinds with Nova.</p>

        <p>Our mission is simple: provide products of the highest quality. That's been the driving force behind our efforts since the day we opened our doors; we don't just want to meet your expectations for powerful and easy-to-use web software, we want to exceed it.</p>
    </div> --}}
@endsection
