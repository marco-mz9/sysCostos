<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-blue-100 md:text-2xl">
            {{--            IVA--}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                        <div class="block mb-8">
                            <a href="{{ route('taxes.create') }}"
                               class="items-center text-white py-1 px-4 w-auto bg-gray-500 hover:bg-gray-700 rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none bg-blue-500 hover:bg-blue-700">
                                <i class="fas fa-user-plus mr-3"></i>Crear IVA</a>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <x-success-message></x-success-message>
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-mio">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-warmGray-50 uppercase tracking-wider">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-6 py-3 font-medium "></th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($taxes as $tax)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $tax->name }}
                                                    </td>
                                                    <td class="flex items-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <a href="{{ route('taxes.edit', $tax->id) }}"
                                                           class="flex items-center text-white py-1 px-4 w-auto bg-gray-500 hover:bg-gray-700 rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none mr-2 bg-green-400 hover:bg-green-700 mr-2">
                                                            <i class="fa fa-edit mr-3"></i>Editar</a>
                                                        <form class="inline-block" method="POST"
                                                              action="{{ route('taxes.destroy', $tax->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class=" flex items-center text-white py-1 px-4 w-auto bg-gray-500 hover:bg-gray-700 rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none bg-red-400 hover:bg-red-700 mr-2 show_confirm">
                                                                <i class="fa fa-trash mr-3"></i>Eliminar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{--                                    {{ $users->links() }}--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
