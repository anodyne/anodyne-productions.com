@extends('layouts.account')

@section('title', 'Delete My Account')

@section('content')
    <form action="{{ route('account.info.update') }}" role="form" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col">
            <section>
                <div class="flex">
                    <div class="w-2/5 mr-12">
                        <h2 class="text-2xl font-medium text-red-500 mb-4">Delete My Account</h2>

                        <p class="text-grey-500">This will delete your account as well as all information across all Anodyne systems and services. <strong>Please use caution as this cannot be undone!</strong></p>

                        <p class="text-grey-500 mt-6"><em>Please Note:</em> Account deletion only applies to content owned by Anodyne and not any games you are currently a part of.</p>
                    </div>
                    <div class="flex-1">&nbsp;</div>
                </div>
            </section>

            <section class="flex justify-end border-t pt-10">
                <button type="submit" class="button-red-bold">Delete</button>
            </section>
        </div>
    </form>
@endsection