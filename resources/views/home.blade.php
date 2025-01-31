@extends('layout.main')
@section('content')
    <div class="flex flex-row max-w-[1500px] w-full h-screen mx-auto">
        <div class="max-w-[500px] w-full border h-full flex flex-col">
            <div class="flex flex-row justify-between items-center p-6 relative">
                <div class="flex flex-row items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt=""
                    class="rounded-full h-12 w-12">
                    <div class="flex flex-col">
                        <div class="font-semibold ml-2 w-auto truncate max-w-52">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="text-gray-600 text-sm w-auto truncate max-w-52 bg-gray-200 rounded-md px-2">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center space-x-4 text-gray-600 relative">
                    <!-- Tombol Translate -->
                    <livewire:tl-menu />
                    <!-- Tombol Icon -->
                    <livewire:add-contact />
                    <!-- Tombol 3 Titik -->
                    <button onclick="togglePopup()" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </button>
            
                    <!-- Popup -->
                    <div id="popupMenu" class="absolute right-0 top-10 w-48 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                        <ul>
                            <li>
                                <button onclick="logout()" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </li>
                            <li>
                                <button onclick="copyMyCode()" class="w-full text-left px-4 py-2 hover:bg-gray-100">Copy My Username</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <livewire:search-contact />
            <livewire:contact-list />
        </div>

            <livewire:chat-box />
    </div>
@endsection

@push('scripts')
    <script>
        function togglePopup() {
            var popup = document.getElementById("popupMenu");
            popup.classList.toggle("hidden");
        }

        function logout() {
            window.location.href = '/logout';
        }

        function copyMyCode() {
            navigator.clipboard.writeText('{{ auth()->user()->username }}');

            alert('Kode pengguna anda berhasil disalin');
        }
    </script>
@endpush
