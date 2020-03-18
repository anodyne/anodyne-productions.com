@extends('layouts.account')

@section('title', 'Account Info')

@section('content')
    <form action="{{ route('account.info.update') }}" role="form" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col">
            <section>
                <div class="flex">
                    <div class="w-2/5 mr-12">
                        <h2 class="text-2xl font-medium text-blue-500 mb-4">Basic Info</h2>
                        <p class="text-grey-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic vero dolores, pariatur, iusto obcaecati consectetur tempora repellat odio.</p>
                    </div>
                    <div class="flex-1">
                        <div class="mb-10">
                            <label class="block mb-1 uppercase tracking-wide text-sm text-grey-500 font-medium">Username</label>
                            <p class="text-lg">@anodyne</p>
                        </div>

                        <div class="mb-10">
                            <label for="email" class="block mb-1 uppercase tracking-wide text-sm text-grey-500 font-medium">Email Address</label>
                            <input type="email" name="email" id="email" class="appearance-none border-2 rounded p-3 block w-full focus:outline-none focus:border-grey-300" value="admin@example.com">
                        </div>

                        <div class="mb-10">
                            <label for="password" class="block mb-1 uppercase tracking-wide text-sm text-grey-500 font-medium">Password</label>
                            <input type="password" name="password" id="password" class="appearance-none border-2 rounded p-3 block w-full focus:outline-none focus:border-grey-300">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block mb-1 uppercase tracking-wide text-sm text-grey-500 font-medium">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="appearance-none border-2 rounded p-3 block w-full focus:outline-none focus:border-grey-300">
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-12 border-t pt-12">
                <div class="flex">
                    <div class="w-2/5 mr-12">
                        <h2 class="text-2xl font-medium text-blue-500 mb-4">Signature</h2>
                        <p class="text-grey-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic vero dolores, pariatur, iusto obcaecati consectetur tempora repellat odio.</p>
                    </div>
                    <div class="flex-1">
                        <div class="mb-10">
                            <textarea name="signature" id="signature" rows="10" class="appearance-none border-2 rounded p-3 block w-full focus:outline-none focus:border-grey-300"></textarea>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flex justify-end border-t pt-10">
                <button type="submit" class="button-blue">Save</button>
            </section>
        </div>
    </form>
@endsection