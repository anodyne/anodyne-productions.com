<x-filament::page>
    <div class="grid grid-cols-5 gap-8">
        <div class="col-span-2">
            <div class="prose dark:prose-invert">
                <h2>Basic info</h2>
                <p>Your username and links will be publicly accessible; name and email address can only be seen by the Anodyne staff.</p>
            </div>
        </div>

        <div class="col-span-3">
            <x-filament-panels::form wire:submit="updateInfo">
                <x-filament::section>
                    {{ $this->editInfoForm }}

                    <x-slot name="footerActions">
                        <x-filament::button type="submit" size="sm">
                            Save
                        </x-filament::button>
                    </x-slot>
                </x-filament::section>
            </x-filament-panels::form>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-8">
        <div class="col-span-2">
            <div class="prose dark:prose-invert">
                <h2>Change your password</h2>
                <p>This will be used to sign in to your account. We recommend using a secure password or passphrase that you don’t use anywhere else.</p>
            </div>
        </div>

        <div class="col-span-3">
            <x-filament-panels::form wire:submit="updatePassword">
                <x-filament::section>
                    {{ $this->changePasswordForm }}

                    <x-slot name="footerActions">
                        <x-filament::button type="submit" size="sm">
                            Submit
                        </x-filament::button>
                    </x-slot>
                </x-filament::section>
            </x-filament-panels::form>
        </div>
    </div>
</x-filament::page>
