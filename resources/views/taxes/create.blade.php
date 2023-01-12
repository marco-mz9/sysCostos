<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flow-root ">
                        <a href="{{ route('taxes.index') }}"
                           class="float-right text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <i class="fas fa-arrow-left"></i>
                            Atras
                        </a>
                    </div>
                    {{--<x-validation-errors class="mb-4" :errors="$errors"/>--}}
                    <form class="space-y-4 text-gray-700" action="{{ route('taxes.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4 text-gray-700">
                            <div class="w-full px-2 md:w-full sm:w-1/2">
                                <label class="block mb-1 text-center" for="formInput_client_name">IVA</label>
                                <input
                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                    type="text"
                                    name="name" id="formInput_client_name"/>
                            </div>
                        </div>
                        <div class="flex justify-center ">
                            <button type="submit"
                                    class="text-white m-3 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
