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
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap mx-3 space-y-4 md:space-y-0" id="product"></div>
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
                    let detail = '';
                    let classification = '';
                    const numbers = data.products[0].details;
                    numbers.forEach((number, index) => {
                        detail += (Number(index) + 1) + '  : ' + number.detail + '\n';
                        classification += (Number(index) + 1) + '  : ' + number.classification.name + '\n';
                    });
                    let html_product = '' +
                        '<div class="w-full px-2 md:w-1/5 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Orden de Porducción</label>' +
                        '<input  type="text" value="' + data.id + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +

                        '<div class="w-full px-2 md:w-1/5 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Fecha de Inicio</label>' +
                        '<input  type="text" value="' + data.date_start + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/5 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Fecha de Entrega</label>' +
                        '<input  type="text" value="' + data.date_end + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/5 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Cliente</label>' +
                        '<input  type="text" value="' + data.client.name + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/5 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Producto</label>' +
                        '<input  type="text" value="' + data.products[0].product + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Pedido</label>' +
                        '<input  type="text" value="' + data.sale.id + '" class="w-full h-10 px-3 text-base border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Detalles</label>' +
                        '<textare  class=" block pt-2 w-full h-10 px-3 text-base border border-black rounded-lg focus:shadow-outline">' +
                        '' + detail + '' +
                        '</textare>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Clasificación</label>' +
                        '<textare  class=" block pt-2 w-full h-10 px-3 text-base border border-black rounded-lg focus:shadow-outline">' +
                        '' + classification + '' +
                        '</textare>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Cantidad</label>' +
                        '<input  type="text" value="' + data.products[0].pivot.quantity + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Precio  Unitario</label>' +
                        '<input  type="text" value="' + data.products[0].price + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>' +
                        '<div class="w-full px-2 md:w-1/6 sm:w-1/2" >' +
                        '<label class="block mb-1" for="product">Precio Total</label>' +
                        '<input  type="text" value="' + data.products[0].pivot.total_price + '" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" disabled>' +
                        '</div>';
                    console.log(html_product);
                    $("#product").html(html_product);
                });
            }
        </script>
    @endsection
</x-app-layout>
