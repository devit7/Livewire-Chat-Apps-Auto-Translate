<div class="p-6 space-y-4 flex flex-col overflow-y-auto">
    @forelse ($contacts as $contact)
        <div wire:key="contact-{{ $loop->index }}" wire:click="$dispatch('openChat', { receiverId: {{ $contact->contact->id }} })"
            class="flex flex-row items-center border-t py-2 hover:border-blue-500 cursor-pointer">
            <div class="flex flex-row items-center space-x-4">
                <img src="https://ui-avatars.com/api/?name={{ $contact->contact->name }}" alt=""
                    class="rounded-full h-12 w-12">
                <div>
                    <div class="font-semibold">{{ $contact->contact->name }}</div>
                    <div class="text-gray-600 truncate w-52">Klik untuk mulai chat </div>
                </div>
            </div>
        </div>
    @empty
        <div class="flex flex-row items-center justify-center h-full">
            <div class="text-gray-500">Belum ada / kontak tidak ditemuan</div>
        </div>
    @endforelse
</div>
