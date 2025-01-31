<div class="cursor-pointer">
    <button class="btn" onClick="showModalAdd()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
        </svg>
    </button>

    <!-- Modal -->
    <div id="openModalAdd" class="hidden fixed z-10 inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-bold">Add Contact</h3>
            <p class="py-4">Masukan username pengguna yang ingin ditambahkan</p>
            <div class="py-4">
                <input type="text" required class="w-full border border-gray-300 rounded-lg p-2 outline-none"
                    placeholder="Enter Username" wire:model="inputUserCode">
                <div id="error-message" class="text-red-500 text-sm"></div>
            </div>

            <div class="flex flex-row justify-between">
                <button class="bg-gray-300 rounded-lg py-2 w-20" onclick="hideModalAdd()">Cancel</button>
                <button class="bg-blue-500 text-white rounded-lg py-2 w-20" wire:click.prevent="addContact">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
    const modalOpen = document.getElementById("openModalAdd");
    var errorMessage =document.getElementById("error-message");

    function showModalAdd() {
        modalOpen.classList.remove("hidden");
    }

    function hideModalAdd() {
        modalOpen.classList.add("hidden");
        // remove error message
        errorMessage.innerHTML = '';
        // reset input
        document.querySelector('input').value = '';

    }
    document.addEventListener('keep-modal-open', (event) => {
        //console.log(event.detail.message);
        errorMessage.innerHTML = event.detail.message;


    });

</script>
