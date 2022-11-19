<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
   
   <x-custom-page-edit :business="$business" :customPage="$customPage" :columnNames="$columnNames"></x-custom-page-edit>

   </x-base-layout>