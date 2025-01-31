<div class="max-w-[1000px] flex flex-col w-full border bg-gray-200">
    @if ($receiverExists == true)
        {{-- Navbar Chat Name --}}
        <div class="flex flex-row items-center justify-between  w-full max-w-[1000px] p-4 border-b bg-white">
            <div class="flex flex-row items-center space-x-4">
                <img src="https://ui-avatars.com/api/?name={{ $dataUserDiChat->name }}" alt=""
                    class="rounded-full h-12 w-12">
                <div>
                    <div class="font-semibold">
                        {{ $dataUserDiChat->name }}
                    </div>
                    <div class="text-gray-600">
                        {{ $dataUserDiChat->email }}
                    </div>
                </div>
            </div>
            {{-- Code --}}
            <div wire:ignore class="flex flex-row items-center space-x-4 text-gray-600 relative">
                <div class="text-gray-600 flex flex-col md:flex-row  gap-2">

                    <span>
                        Username
                    </span>
                    <span class="bg-gray-200 px-2 py-1 rounded-md">
                        {{ $dataUserDiChat->username }}
                    </span>
                </div>
                <button onclick="togglePopup2()" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                    </svg>
                </button>
                <!-- Popup -->
                <div id="popupMenu2"
                    class="absolute  w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden right-0 top-10">
                    <ul>
                        <li>
                            <button wire:click="hapusKontak({{ $dataUserDiChat->id }})"
                                class="w-full text-left px-4 py-2 hover:bg-gray-100">Delete Contact</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Box --}}
        <div id="chat-container" class="flex flex-col max-h-screen overflow-y-auto h-full">
            <div class="flex flex-col space-y-4 p-6 h-full" wire:poll.5s="loadMessages">
                {{-- {{ dd($messages) }} --}}
                @forelse ($messages as $message)
                    <div
                        class="flex flex-row items-center space-x-4  {{ $message->sender_id === auth()->id() ? 'justify-end' : '' }}">
                        {{-- Dari saya --}}
                        @if ($message->sender_id !== auth()->id())
                            <img src="https://ui-avatars.com/api/?name={{ $message->sender->name }}" alt=""
                                class="rounded-full h-12 w-12">
                        @endif
                        {{-- Dari lawan chat --}}
                        <div
                            class="p-4 rounded-lg flex gap-4 {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-white' }}">

                            <div class="break-all">
                                {{ $message->message }}
                                @if ($messageAfterTranslate && $messageAfterTranslate[0]['id'] === $message->id)
                                    <div class="text-xs text-gray-500" >
                                        (Diterjemahkan: {{ $messageAfterTranslate[0]['message'] }})
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col items-end">
                                <div class="text-xs text-gray-300">
                                    {{ $message->created_at->diffForHumans() }}
                                </div>
                                {{-- hanya tampil jika pesan dari lawan chat --}}
                                @if ($message->sender_id !== auth()->id())
                                    <div class="  text-gray-300 hover:text-gray-500 cursor-pointer"
                                        wire:click="$dispatch('openTranslate', [ {message: '{{ $message->message }}'}, {messageId: {{ $message->id }} } ])">
                                        <i class="fa-solid fa-language"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-row items-center justify-center h-full">
                        <div class="text-gray-500">Belum ada pesan</div>
                    </div>
                @endforelse
            </div>

            {{-- Scroll bubble --}}
            {{-- <div wire:ignore id="scrolled-bubble"
                class=" bottom-8 right-8 sm:bottom-20 sm:right-20 fixed flex items-center space-x-3 z-50">
                <div
                    class="bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg p-4 transition transform hover:scale-110 z-50">

                </div>
            </div> --}}
        </div>



        {{-- Chat input --}}
        <div class="flex flex-row shadow-lg items-center p-2 border-t-2 bg-white border-b mx-auto w-full">
            <input wire:model="newMessage" type="text" placeholder="Ketik pesan..."
                class="w-full px-5 rounded-lg border-gray-300 focus:outline-none">
            <button wire:click="sendMessage" class="bg-gray-500 text-white p-2 rounded-sm hover:bg-gray-600">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>

            </button>
        </div>
    @else
        <div class="flex flex-row items-center justify-center h-full">
            <div class="text-gray-500">Pilih kontak untuk memulai chat</div>
        </div>
    @endif
</div>


<script>
    function togglePopup2() {
        var popup = document.getElementById("popupMenu2");
        popup.classList.toggle("hidden");
    }
</script>
