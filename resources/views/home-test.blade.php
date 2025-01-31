@extends('layout.main')
@section('content')
    <div class=" flex flex-row max-w-[1500px] w-full h-screen  mx-auto">

        <div class="max-w-[500px] w-full border  h-full flex flex-col ">
            <div class="flex flex-row justify-between items-center p-6 ">
                <div class=" font-semibold text-2xl">
                    Chats
                </div>
                <div class="flex flex-row items-center space-x-4 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                    </svg>
                </div>
            </div>
            <form action="" class=" flex flex-row items-center bg-gray-300 border m-6 rounded-md py-2 px-4 gap-4 ">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
                <input type="text" placeholder="Cari kontak" class="input w-full  bg-gray-300 focus:outline-none ">
            </form>
            {{-- Chat List --}}
            <div class=" p-6 space-y-4 flex flex-col overflow-y-auto  ">

                <div class="flex flex-row items-center border-t py-2 hover:border-blue-500 cursor-pointer">
                    <div class="flex flex-row items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-full h-12 w-12">
                        <div>
                            <div class="font-semibold">
                                John Doe
                            </div>
                            <div class="text-gray-600 truncate w-52">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                            </div>

                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center mt-6 border-t py-2 hover:border-blue-500 cursor-pointer">
                    <div class="flex flex-row items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-full h-12 w-12">
                        <div>
                            <div class="font-semibold">
                                John Doe
                            </div>
                            <div class="text-gray-600 truncate w-52">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="max-w-[1000px] flex flex-col w-full border bg-gray-200">
            {{-- Navbar Chat Name --}}
            <div class="flex flex-row items-center justify-between  w-full max-w-[1000px] p-4 border-b bg-white">
                <div class="flex flex-row items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-full h-12 w-12">
                    <div>
                        <div class="font-semibold">
                            John Doe
                        </div>
                        <div class="text-gray-600">
                            Online
                        </div>
                    </div>
                </div>
            </div>
            {{-- Chat Box --}}
            <div class="flex flex-col max-h-screen overflow-y-auto h-full "> <!-- Tambahkan margin-bottom -->
                <div class="flex flex-col space-y-4 p-6  h-full">
                    <div class="flex flex-row items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-full h-12 w-12">
                        <div class="bg-white p-4 rounded-lg">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                        </div>
                    </div>
                    <div class="flex flex-row items-center space-x-4 justify-end">
                        <div class="bg-blue-500 p-4 rounded-lg text-white">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                        </div>
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="" class="rounded-full h-12 w-12">
                    </div>

                </div>
            </div>
            {{-- Chat Input --}}
            <div
                class="flex flex-row shadow-lg items-center p-2 border-t-2 bg-white  border-b mx-auto   w-full max-w-[1000px]">
                <input type="text" placeholder="Ketik pesan..."
                    class="w-full px-5 rounded-lg border-gray-300 focus:outline-none">
                <button type="submit" class="bg-gray-500 text-white p-2 rounded-full hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06l-6.22-6.22V21a.75.75 0 0 1-1.5 0V4.81l-6.22 6.22a.75.75 0 1 1-1.06-1.06l7.5-7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endsection
