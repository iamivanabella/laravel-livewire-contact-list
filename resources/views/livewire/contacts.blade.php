<div class="inline-block w-full shadow rounded-lg overflow-hidden">
    <table class="w-full leading-normal">
        <thead>
            <tr class="text-left">
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Avatar
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Email
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Contact Number
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Address
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Notes
                </th>
                <th
                    class="px-3 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if ($contact->avatar)
                            <img src="{{ asset('storage/' . $contact->avatar) }}" class="size-12 rounded-full object-cover" alt="Avatar">
                        @else
                            <img src="https://placehold.co/40" class="size-12 rounded-full object-cover" alt="Placeholder Avatar">
                        @endif
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $contact->name }}</p>
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $contact->email }}</p>
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $contact->contact_number }}</p>
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $contact->address }}</p>
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $contact->notes }}</p>
                    </td>
                    <td class="px-3 py-5 border-b border-gray-200 bg-white text-sm">
                        <x-secondary-button class="my-1" wire:navigate :href="route('edit-contact', $contact)">{{ __('Edit') }}</x-secondary-button>
                        <x-danger-button wire:click="delete({{ $contact->id }})" class="my-1">{{ __('Delete') }}</x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
