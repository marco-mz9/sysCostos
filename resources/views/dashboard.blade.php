<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    Configuración

                    <div class="flex flex-wrap  mx-5 space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/5 sm:w-1/2">
                            <a href="{{ route('taxes.index')}}"
                               class="flex items-center text-white py-1 px-4 w-auto bg-gray-500 hover:bg-gray-700 rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none mr-2 bg-green-400 hover:bg-green-700 mr-2">
                                <i class="fa fa-edit mr-3"></i>Configurar IVA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
