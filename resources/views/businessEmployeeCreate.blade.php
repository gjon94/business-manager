<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
     
    <x-employee-create :business="$business" ></x-employee-create>
   </x-base-layout>