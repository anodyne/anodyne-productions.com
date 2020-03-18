@extends('layouts.master')

@section('app-template')
    <div class="flex flex-col justify-between h-screen">
        <div>
            <nav class="flex items-center relative z-10 bg-white shadow-md py-3 mb-12">
                <div class="container">
                    <div class="flex items-center justify-between">
                        <div class="flex-shrink">
                            <anodyne-logo class="text-blue-500" :with-text="true" :md="true"></anodyne-logo>
                        </div>

                        <a href="{{ route('login') }}" class="button-grey-outline">
                            Sign In
                        </a>
                    </div>
                </div>
            </nav>

            {{-- <header class="flex flex-col w-full text-center bg-blue-700 py-20 mb-12">
                <h1 class="text-white font-bold text-4xl">My Account</h1>
                <div class="text-blue-100 text-lg w-1/3 mx-auto font-medium">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi recusandae, est iste velit excepturi totam aliquid molestiae.
                </div>
            </header> --}}

            @yield('aside')

            @yield('template')
        </div>

        <footer class="bg-grey-900 text-grey-400 py-12">
            <div class="container">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                        <div class="text-2xl font-thin text-grey-200 mb-6">
                            <anodyne-logo :with-text="true" :md="true"></anodyne-logo>
                        </div>

                        {{-- <p class="leading-loose text-sm mb-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit incidunt ut aspernatur doloribus consequuntur molestias dolorem, pariatur deleniti quam quis temporibus magnam. Assumenda omnis beatae provident, placeat corrupti eveniet labore!</p> --}}

                        <div class="flex items-center">
                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-facebook" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-twitter" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="read-email-at" class="h-6 w-6"></app-icon>
                            </a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-medium mb-3">About Us</div>

                            <a href="{{ route('home') }}" class="block mb-1 text-grey-600 hover:text-grey-400 no-underline">
                                Home
                            </a>
                            <a href="https://discuss.anodyne-productions.com" target="_blank" class="block mb-1 text-grey-600 hover:text-grey-400 no-underline">
                                Discussions
                            </a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-medium mb-3">Nova</div>

                            <a href="#/nova" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">Download</a>
                            <a href="#/nova-nextgen" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">Nova NextGen</a>
                        </div>
                    </div>

                    <div class="flex-shrink">
                        <div class="flex flex-col justify-end mb-6">
                            <div class="uppercase tracking-wide text-grey-400 text-sm font-medium mb-3">Products</div>

                            <a href="https://xtras.anodyne-productions.com" target="_blank" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">AnodyneXtras</a>
                            <a href="https://help.anodyne-productions.com" target="_blank" class="block text-grey-600 hover:text-grey-400 mb-1 no-underline">Help Center</a>
                        </div>
                    </div>

                    {{-- <div class="w-full md:w-1/6">
                        <div class="uppercase tracking-wide text-grey-400 text-sm font-medium mb-3">Get In Touch</div>

                        <div class="flex items-center">
                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-facebook" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="social-media-twitter" class="h-6 w-6 mr-4"></app-icon>
                            </a>

                            <a href="#" class="text-grey-600 hover:text-grey-400">
                                <app-icon name="read-email-at" class="h-6 w-6"></app-icon>
                            </a>
                        </div>
                    </div> --}}
                </div>

                <div class="flex flex-col md:flex-row justify-between border-t border-grey-800 mt-6 pt-6 text-sm text-grey-500 leading-normal">
                    <div>&copy; {{ date('Y') }} Anodyne Productions. All rights reserved.</div>

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
@endsection