<div >
    <button  onclick="closeModalPost(this,'nextElementSibling')">&#10133;</button>
   <div class="glassEffect flex p-5 items-end flex-col text-white opacity-0 z-[-5] h-fit absolute left-0
    right-0 top-64 bottom-64 md:left-[15vw] md:right-[15vw]  bg-slate-800" >
    <button onclick="closeModalPost(this,'parentElement')">&#10005;</button>
    <form action="{{route('business.posts.store',[request()->business])}}" method="POST" class=" w-full flex flex-col gap-4">
        @csrf

        <label for="title">Inserisci titolo</label>
        <input class="text-black" type="text" name="title" >

        <label for="body">Inserisci descrizione</label>
        <textarea class="text-black" name="body" id=""  cols="30" rows="10"></textarea>

        <button  class="w-1/2 m-auto p-3 hover:bg-white hover:text-black border border-white" type="submit">Crea</button>
    </form>
   </div> 
   <script>
    function closeModalPost(e,familyHtml){
        e[familyHtml].classList.toggle('opacity-0')
        e[familyHtml].classList.toggle('z-[-5]')
    }
   </script>
</div>

