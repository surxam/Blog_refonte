<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 

    
        {{--CRUD des articles--}}
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                

           <a href="{{ route('dashboard.create') }}"
                    class="rounded-md bg-green-600 px-4 py-2 mb-5 text-sm font-semibold text-white hover:bg-green-500">
                        Créer un article
            </a>



               <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
        <tr>
       
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Description
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200" @foreach($articles as $article)>

        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                   
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$article->titre}}
                        </div>
                    
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"> {{$article->description}} </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href='{{route('dashboard.edit',$article->id)}}' class="px-3 py-1.5 font-medium bg-blue-600 rounded-md text-white">Editer</a>
                {{--Bouton sup--}}


         
                    <form id="delete-form-{{ $article->id }}" action="{{ route('dashboard.destroy', $article->id) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="button" data-modal-target="modal-{{ $article->id }}" data-modal-toggle="modal-{{ $article->id }}"
                            class="rounded-md bg-red-600 px-2.5 py-2 text-sm font-semibold text-white">
                            Supprimer
                   </button>


                    <div id="modal-{{ $article->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto mt-20">
                            <div class="relative bg-gray-800 rounded-lg shadow">
                                <div class="p-6 text-center">
                                    <h3 class="mb-5 text-lg font-normal text-white">Voulez-vous vraiment supprimer cet article ?</h3>
                                    <button type="button" onclick="document.getElementById('delete-form-{{ $article->id }}').submit()"
                                        class="text-white bg-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none rounded-lg px-5 py-2.5 mr-2">
                                        Supprimer
                                    </button>
                                    <button type="button" data-modal-hide="modal-{{ $article->id }}"
                                        class="text-gray-400 bg-gray-700 hover:bg-gray-600 focus:ring-4 focus:outline-none rounded-lg px-5 py-2.5">
                                        Annuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

            </td>
        </tr>

    </tbody @endforeach>
</table>

                    
                

                </div>
            </div>
        </div>
    </div>

   <script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.2/flowbite.min.js"></script>

</x-app-layout>
