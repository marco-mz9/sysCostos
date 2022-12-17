<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="space-y-4 text-gray-700">
                    <div class="flex flex-wrap justify-center mx-5 space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-3/6 sm:w-1/2">
                            <label class="block mb-1 text-center" for="select_order"> Orden de Producción</label>
                            <select
                                class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                name="order" id="select_order">
                                <option value="option_select" disabled selected>Seleccione Orden</option>
                                @foreach($ord as $value)
                                    <option value="{{ $value->id }}">{{  $value->id}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--                        <div class="flex justify-center ">--}}
                        {{--                            <button type="submit" name="action" value="save"--}}
                        {{--                                    class="text-white m-3 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">--}}
                        {{--                                <i class="fas fa-search"> </i> Buscar--}}
                        {{--                            </button>--}}
                        {{--                            <button type="submit" name="action" value ="excel"--}}
                        {{--                                    class="text-white m-3 bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">--}}
                        {{--                                <i class="fas fa-file-excel"></i>   Exportar Excel--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 ">
        <div class="max-w-screen-2xl mx-auto sm:px-6 md:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">
                    <div class="flex flex-wrap mx-3 space-y-4 md:space-y-0" id="product"></div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full table-auto divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Compra
                                </th>
                                <th scope="col"
                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Detalle
                                </th>
                                <th scope="col"
                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th scope="col"
                                    class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody id="table_bodyT">
                            </tbody>
                            <tfoot id="table_footT">
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript">

            $(function () {
                $("#select_order").on('change', onSelectOrderChange)
            });

            function onSelectOrderChange() {
                let id = $(this).val();
                $.get('/api/fetch-products/' + id + '/products', function (data) {
                    const dta = data.purchase[0].details;
                    let total = [];
                    for (const element of dta) {
                        // console.log(element);
                        //  total += parseInt(element.total_value);
                        total += element.total_value + ',';
                        $('#table_bodyT').append(
                            $('<tr>').append(
                                $('<td>').append(
                                    $('<div class="text-sm text-center leading-5 text-gray-500">').text(element.id)
                                ),
                                $('<td>').append(
                                    $('<div class="text-sm text-center leading-5 text-gray-500">').text(element.detail.detail)
                                ),
                                $('<td>').append(
                                    $('<div class="text-sm text-center leading-5 text-gray-500">').text(element.quantity)
                                ),
                                $('<td>').append(
                                    $('<div class="text-sm text-center leading-5 text-gray-500">').text(element.total_value)
                                ),
                            )
                        )
                    }
                    let result = total.split(',').map(Number);
                    let total1 = result.reduce((a, b) => a + b, 0);
                    let cantidad = data.products[0].pivot.quantity;

                    let total_unit = total1 / cantidad;
                    let utilidad = data.products[0].pivot.total_price - total1;
                    console.log(total_unit);
                    $('#table_footT').append(
                        $('<tr>').append(
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-left leading-5 text-gray-500">').text('Total')
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text(total1)
                            ),
                        ),
                        $('<tr>').append(
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-left leading-5 text-gray-500">').text('Total Unitario')
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text(total_unit)
                            ),
                        ),
                        $('<tr>').append(
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text()
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-left leading-5 text-gray-500">').text('Utilidad')
                            ),
                            $('<td>').append(
                                $('<div class="text-sm text-center leading-5 text-gray-500">').text(utilidad)
                            ),
                        )
                    )
                    let html_product = '' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Fecha de Inicio</label>' +
                        '<input  type="text" value="' + data.date_start + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Fecha de Entrega</label>' +
                        '<input  type="text" value="' + data.date_end + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Cliente</label>' +
                        '<input  type="text" value="' + data.client.name + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Producto</label>' +
                        '<input  type="text" value="' + data.products[0].product + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Pedido</label>' +
                        '<input  type="text" value="' + data.sale.id + '" class="w-full h-10 px-3 text-base border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Cantidad</label>' +
                        '<input  type="text" value="' + data.products[0].pivot.quantity + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Precio Unitario Acordado</label>' +
                        '<input  type="text" value="' + data.products[0].price + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6  sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Precio Total</label>' +
                        '<input  type="text" value="' + data.products[0].pivot.total_price + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>';
                    // console.log(html_product);
                    $("#product").html(html_product);
                });
            }
        </script>
    @endsection
</x-app-layout>
