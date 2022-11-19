<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
   
   <x-custom-page-create :business="$business"></x-custom-page-create>

   </x-base-layout>