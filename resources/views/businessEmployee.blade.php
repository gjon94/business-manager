<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
     
    <x-employees-index :business="$business" :employees="$employees" ></x-employees-index>
   </x-base-layout>