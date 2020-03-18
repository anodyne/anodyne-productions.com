@extends('layouts.account')

@section('title', 'Preferences')

@section('content')
    <form action="{{ route('account.info.update') }}" role="form" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col">
            <section>
                <div class="flex">
                    <div class="w-2/5 mr-12">
                        <h2 class="text-2xl font-medium text-blue-500 mb-4">AnodyneXtras</h2>
                        <p class="text-grey-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic vero dolores, pariatur, iusto obcaecati consectetur tempora repellat odio.</p>
                    </div>
                    <div class="flex-1">&nbsp;</div>
                </div>
            </section>

            <section class="mt-12 border-t pt-12">
                <div class="flex">
                    <div class="w-2/5 mr-12">
                        <h2 class="text-2xl font-medium text-blue-500 mb-4">Discussions</h2>
                        <p class="text-grey-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic vero dolores, pariatur, iusto obcaecati consectetur tempora repellat odio.</p>
                    </div>
                    <div class="flex-1">&nbsp;</div>
                </div>
            </section>

            <section class="flex justify-end border-t pt-10">
                <button type="submit" class="button-blue">Save</button>
            </section>
        </div>
    </form>
@endsection
