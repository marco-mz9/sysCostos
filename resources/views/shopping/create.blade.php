<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flow-root ">
                        <a href="{{ route('purchases.index') }}"
                           class="float-right text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <i class="fas fa-arrow-left"></i>
                            Atras
                        </a>
                    </div>
                    <form class="space-y-4 text-gray-700" action="{{ route('purchases.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-wrap mx-3 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/5 sm:w-1/2">
                                <label class="block mb-1 text-center" for="formInput_date"> Fecha</label>
                                <input
                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                    type="date"
                                    id="formInput_date" name="date"/>
                            </div>
                            <div class="w-full px-2 md:w-1/5 sm:w-1/2">
                                <label class="block mb-1 text-center" for="formInput_ruc">RUC</label>
                                <input
                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                    type="text"
                                    name="ruc" id="formInput_ruc"/>
                            </div>
                            <div class="w-full px-2 md:w-1/5 sm:w-1/2">
                                <label class="block mb-1 text-center" for="formInput_authorization">Autorización</label>
                                <input
                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                    type="text"
                                    name="authorization" id="formInput_authorization"/>
                            </div>
                            <div class="w-full px-2 md:w-1/5">
                                <label class="block mb-1 text-center" for="formInput_supplier_name">Proveedor</label>
                                <input
                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                    type="text"
                                    name="name" id="formInput_supplier_name"/>
                            </div>
                            <div class="w-full px-2 md:w-1/5 sm:w-1/2">
                                <label class="block mb-1 text-center" for="select_class"> Orden</label>
                                <select
                                    class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                    name="order" id="select_class">
                                    <option value="option_select" disabled selected></option>
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-10">
                                    <div class="">
                                        Ordenes
                                    </div>
                                    <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full table-auto divide-y divide-gray-200"
                                               id="purchases_table">
                                            <thead class="bg-gray-100">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Detalle
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Clasificación
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Cantidad
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Costo Unitario
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    IVA
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <input
                                                        class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                                        type="text" name="details[0][detail]"/>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <select
                                                        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                                        name="details[0][classification_id]">
                                                        <option value="option_select" disabled selected></option>
                                                        @foreach($classification as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <input
                                                        class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                                        type="text" name="details[0][quantity]"/>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <input
                                                        class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                                        type="text" name="details[0][unit_value]"/>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <select
                                                        class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                                        name="details[0][tax_id]">
                                                        <option value="option_select" disabled selected></option>
                                                        @foreach($taxes as $tax)
                                                            <option value="{{ $tax->id }}">{{ $tax->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="flow-root ">
                                            <button type="button" id="add_purchase"
                                                    class="float-left text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                <svg class="h-5 w-5 inline-block text-white-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
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

    @section('scripts')
        <script>
            $(document).ready(function () {
                let i = 0;
                $("#add_purchase").click(function () {
                    ++i;
                    $("#purchases_table").append('' +
                        '<tr>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="text"  class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"' +
                        'name="details[' + i + '][detail]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200"> ' +
                        '<select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"' +
                        'name="details[' + i + '][classification_id]">' +
                        ' <option value="option_select" disabled selected> </option>' +
                        ' @foreach($classification as $value)' +
                        '<option value="{{ $value->id }}" >{{ $value->name}}</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="text" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" ' +
                        'name="details[' + i + '][quantity]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="text" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" ' +
                        'name="details[' + i + '][unit_value]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200"> ' +
                        '<select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"  ' +
                        'name="details[' + i + '][tax_id]">' +
                        ' <option value="option_select" disabled selected> </option>' +
                        ' @foreach($taxes as $tax)' +
                        '<option value="{{ $tax->id }}" >{{ $tax->name}}</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200" >' +
                        '<svg class="h-8 w-8 text-red-500 remove_purchase"  fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                        ' <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>' +
                        ' </svg>' +
                        '</td>' +
                        '</tr>'
                    );
                });
                $(document).on('click', '.remove_purchase', function () {
                    $(this).parents('tr').remove();
                });
            });
        </script>
    @endsection
</x-app-layout>

