<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="block mb-6 pl-2 ">
                        <a href="{{ route('sales.create') }}"
                           class="items-center text-white ml-6 py-1 px-4 w-auto bg-gray-500 hover:bg-gray-700 rounded-full active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none bg-indigo-500 hover:bg-indigo-700">
                            <i class="fas fa-cash-register"></i>
                            Crear Pedido
                        </a>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-10">
                                <x-success-message></x-success-message>
                                <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full table-auto divide-y divide-gray-200">
                                        <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                N° Pedido
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Detalle
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($sales as $sale)
                                            <tr>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$sale->id}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-left leading-5 text-gray-500">
                                                        {{$sale->description}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
{{--                                    {{ $orders->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

