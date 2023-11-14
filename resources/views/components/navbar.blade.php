 {{-- NavBar --}}
 <div class="w-full h-fit flex p-8 fixed items-center justify-between bg-slate-900 z-10">
    <div class="flex items-center">
       <input type="text" placeholder="Search console or games"
           class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500">
    </div>
    <div class="flex items-center">
        <!-- Cart Icon -->
        <a href="{{route('data.keranjang')}}" class="px-4 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
        </a>

        <!-- User Info-->
        <div class="flex items-center mr-[250px]">
            <p class="mr-2 text-white font-bold">Hello, User!</p>
            <div>
                <img src="{{ asset('assets/images/profile.jpg') }}" alt="User Profile"
                    class="w-8 h-8 ml-8 rounded-full">
            </div>
        </div>

        {{-- <div class="basis-1/4 flex justify-end">
       <a href="{{route('login')}}" class="bg-black px-8 py-4 w-24 rounded-lg font-bold flex justify-center pr">
           <p class="invisble text-white">Login</p>
       </a>
   </div> --}}

    </div>
</div>
