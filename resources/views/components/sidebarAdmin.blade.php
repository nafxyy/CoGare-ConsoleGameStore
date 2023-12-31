<div class="w-[300px]">
    <div class="fixed flex flex-col h-screen bg-slate-800 pt-[2%]">
        <div class="w-full flex flex-col items-center mt-2 mb-24">
            <img src="{{asset('assets/images/logopolos.png')}}" alt="" class="items-center w-[200px] object-contain">
        </div>

        <div>
            <a href="{{ route('admin.dashboardAdmin') }}" class="items-center p-5 flex text-white mx-8 hover:bg-slate-900 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path
                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
                <p class="ml-3 font-bold text-xl">Dashboard</p>
            </a>
            <a href="{{ route('admin.gamepad') }}" class="items-center p-5 flex text-white mx-8 mt-5 hover:bg-slate-900 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" > <line x1="6" y1="11" x2="10" y2="11" /> <line x1="8" y1="9" x2="8" y2="13" /> <line x1="15" y1="12" x2="15.01" y2="12" /> <line x1="18" y1="10" x2="18.01" y2="10" /> <path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" /> </svg>
                <p class="ml-3 font-bold text-xl">Data Produk</p>
            </a>

        </div>
        <div>
            <a href="{{ route('logout') }}" class="items-center p-5 flex text-white mx-8 mt-5 hover:bg-slate-900 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>
                <p class="ml-3 font-bold text-xl">Logout</p>
            </a>
        </div>

    </div>

</div>
