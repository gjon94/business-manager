<article class="bg-white border rounded-lg shadow-md">
    <!-- cont img name options posts-->
    <div
      class="flex justify-between h-[5rem] p-3 lg:h-[3rem] lg:p-1"
    >
      <div class="flex">
        <!-- img -->
        <div class="h-[inherit] rounded-full overflow-hidden">
          <img
            class="h-[100%] object-cover aspect-square"
            src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png"
            alt=""
          />
        </div>
        <!-- name and date-->
        <div class="ml-3">
          <h1 class="text-xl">{{$post->name}}</h1>
          <h4 class="text-xs text-cyan-700">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</h4>
        </div>
      </div>
      <!-- option post-->
      <form action="{{route('business.posts.destroy',[request()->business,$post->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">can</button>
      </form>
    </div>
    <a href="">
      <div class="p-3">
        <h1 class="text-xl">{{$post->title}}</h1>
        <p class="text-xs">
         {{$post->body}}
        </p>
      </div>
    </a>
  </article>