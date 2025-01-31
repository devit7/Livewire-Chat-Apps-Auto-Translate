<div class="cursor-pointer">
    <button class="text-lg" onClick="showModalAdd3()">
        <i class="fa-solid fa-language"></i>
    </button>

    <!-- Modal -->
    <div id="openModalAdd3" class="hidden fixed z-10 inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-bold">Setting Translate</h3>
            <p class="py-4">Pilih terjemahan bahasa anda</p>
            <div class="py-4">
                <select wire:model="languages" id="languages" class="w-full p-2 border rounded-md">
                    <!-- Loop through the languages from the JSON -->
                    @foreach ($data['languages'] as $language)
                        <option value="{{ $language['code'] }}" {{ $language['code'] == $languages ? 'selected' : '' }}>
                            {{ $language['language'] }}
                        </option>
                    @endforeach
                </select>
                <div id="error-message3" class="text-red-500 text-sm"></div>
            </div>
            <div class="flex flex-row justify-between">
                <button class="bg-gray-300 rounded-lg py-2 w-20" onclick="hideModalAdd3()">Cancel</button>
                <button class="bg-blue-500 text-white rounded-lg py-2 w-20" wire:click.prevent="changeLanguage">Apply</button>
            </div>
        </div>
    </div>
</div>

<script>
    const modalOpen3 = document.getElementById("openModalAdd3");
    var errorMessage3 =document.getElementById("error-message3");
    var inputusername = document.getElementById("inputusername");

    function showModalAdd3() {
        modalOpen3.classList.remove("hidden");
    }

    function hideModalAdd3() {
        modalOpen3.classList.add("hidden");
        // remove error message
        errorMessage3.innerHTML = '';
        // reset input
        inputusername.value = '';

    }
    document.addEventListener('', (event) => {
        //console.log(event.detail.message);
        errorMessage3.innerHTML = event.detail.message;


    });

</script>