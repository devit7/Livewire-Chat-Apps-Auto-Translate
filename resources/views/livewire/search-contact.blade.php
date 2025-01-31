<div class=" flex flex-row items-center bg-gray-300 border m-6 rounded-md py-2 px-4 gap-4 ">
    <button  wire:click="cariKontak" class="btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
</button>
<input type="text" placeholder="Cari kontak" class="input w-full  bg-gray-300 focus:outline-none " wire:model="search">
</div>
