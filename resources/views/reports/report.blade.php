<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flow-root ">
                        <a href="{{ route('reports.index') }}"
                           class="float-right text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <label> Atras</label>
                        </a>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-10">
                                <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full table-auto divide-y divide-gray-200" id="table">
                                        <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                N°
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fecha
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Detalle
                                            </th>
                                            {{--                                        <th scope="col"--}}
                                            {{--                                            class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
                                            {{--                                            Ruc--}}
                                            {{--                                        </th>--}}
                                            {{--                                        <th scope="col"--}}
                                            {{--                                            class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
                                            {{--                                            Autorización--}}
                                            {{--                                        </th>--}}
                                            {{--                                        <th scope="col"--}}
                                            {{--                                            class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
                                            {{--                                            Proveedor--}}
                                            {{--                                        </th>--}}
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
                                                Costo total
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                IVA
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Total
                                            </th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($reports['report'] as $purchase_detail)
                                            <tr>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->purchase->id}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->purchase->date}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->detail->detail}}
                                                    </div>
                                                </td>
                                                {{--                                            <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">--}}
                                                {{--                                                <div class="text-sm text-center leading-5 text-gray-500">--}}
                                                {{--                                                    {{$purchase_detail->purchase->supplier->ruc}}--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </td>--}}
                                                {{--                                            <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">--}}
                                                {{--                                                <div class="text-sm text-center leading-5 text-gray-500">--}}
                                                {{--                                                    {{$purchase_detail->purchase->authorization}}--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </td>--}}
                                                {{--                                            <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">--}}
                                                {{--                                                <div class="text-sm text-center leading-5 text-gray-500">--}}
                                                {{--                                                    {{$purchase_detail->purchase->supplier->name}}--}}
                                                {{--                                                </div>--}}
                                                {{--                                            </td>--}}
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->detail->classification->name}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->quantity}}</div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        $ {{$purchase_detail->detail->unit_value}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        $ {{$purchase_detail->total_value}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->tax->name}}
                                                    </div>
                                                </td>
                                                <td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200 sum">
                                                    <div class="text-sm text-center leading-5 text-gray-500">
                                                        {{$purchase_detail->total}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot id="reports">
                                        <tr>
                                            <td>
                                                <div class="text-sm text-center leading-5 text-gray-500">
                                                    Total:
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td id="total">
                                                <div class="text-sm text-center leading-5 text-red-500">
                                                    {{$reports['sum_reports']}}
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    @endsection
</x-app-layout>
