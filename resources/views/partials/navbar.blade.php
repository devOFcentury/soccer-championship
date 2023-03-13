<header class="max-w-full bg-blue-700 flex justify-end py-4 pr-20" x-data="{open: false}">
     <div class="relative">
          <p class="cursor-pointer flex p-1" x-on:click="open = !open" x-on:click.outside="open= false">
               <span class="mr-1 text-white">{{ auth()->user()->name }}</span> 
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
             </svg>
          </p>
          <div class="absolute border rounded bg-white px-3 py-1 mt-1 right-1" x-show="open">
               <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Déconnexion</a>
               <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none">@csrf</form>
          </div>
     </div>
</header>