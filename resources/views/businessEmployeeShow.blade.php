<x-base-layout>
    <x-slot name="header">
       <x-header :business="$business"></x-header>
    </x-slot>
     
    <x-employee-show :business="$business" :employee="$employee" :contract="$contract"  ></x-employee-show>
   </x-base-layout>