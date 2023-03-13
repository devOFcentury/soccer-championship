<div class="w-full  col-span-12 mx-auto mb-3" x-data="{ open: false }" @alert-error-message.window="open=true; setTimeout(() => open=false,5000)">
    <p 
        x-cloak 
        x-show="open" 
        x-transition.duration.500ms 
        class="w-3/4 mx-auto text-center text-white bg-red-500 rounded flex justify-between p-3"
    >
        {{$errorMsg}}
    </p>
</div>