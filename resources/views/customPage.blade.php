<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
   
    <x-custom-page-main  :customPage="$customPage" :customTables="$customTables" 
    :business="$business"  :columnNames="$columnNames"></x-custom-page-main>

   </x-base-layout>