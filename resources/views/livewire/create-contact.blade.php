<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Add Contact Information') }}
                        </h2>
                    </header>

                    <form wire:submit.prevent="create" class="mt-6 space-y-6" enctype="multipart/form-data">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="contact_number" :value="__('Contact Number')" />
                            <x-text-input wire:model="contact_number" id="contact_number" name="contact_number" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input wire:model="address" id="address" name="address" type="text" class="mt-1 block w-full" required />
                        </div>

                        <div>
                            <x-input-label for="notes" :value="__('Notes')" />
                            <textarea wire:model="notes" id="notes" name="notes" class="mt-1 block w-full" rows="4"></textarea>
                        </div>

                        <div>
                            <x-input-label for="avatar" :value="__('Avatar')" />
                            <x-text-input wire:model="avatar" id="avatar" name="avatar" type="file" class="mt-1 block w-full" />
                            @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" class="mt-2" style="max-height: 200px;">
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <x-secondary-button :href="route('dashboard')" wire:navigate>{{ __('Cancel') }}</x-secondary-button>
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
