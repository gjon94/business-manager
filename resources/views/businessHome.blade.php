<x-base-layout>
 <x-slot name="header">
    <x-header :business="$business"></x-header>
 </x-slot>
  
 <x-home-main-section :business="$business" :deadlines="$deadlines" :posts="$posts"></x-home-main-section>
</x-base-layout>