<x-app-layout>
    <div class="py-12">
<<<<<<< HEAD
        <div class="sm:max-w-screen-md   mx-auto sm:px-6 lg:px-8">
=======
        <div class="sm:max-w-md   mx-auto sm:px-6 lg:px-8">
>>>>>>> master
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flow-root ">
                        <a href="{{ route('orders.index') }}"
                           class="float-right text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <i class="fas fa-arrow-left"></i>
                            Atras
                        </a>
                    </div>
<<<<<<< HEAD
{{--                    <form class="space-y-4 text-gray-700" action="{{ route('sales.store') }}" method="POST">--}}
                    <form class="space-y-4 text-gray-700" action="{{ route('sales.store') }}" method="POST">
=======
                    <form class="space-y-4 text-gray-700" action="" method="POST">
{{--                    <form class="space-y-4 text-gray-700" action="{{ route('sales.store') }}" method="POST">--}}
>>>>>>> master
                        @csrf
                        {{--                        @if ($errors->any())--}}
                        {{--                            <div class="alert alert-danger" role="alert">--}}
                        {{--                                <ul>--}}
                        {{--                                    @foreach ($errors->all() as $error)--}}
                        {{--                                        <li>{{ $error }}</li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <div class="flex flex-wrap mx-5 space-y-4 md:space-y-0">

                            <div class="w-full px-2 md:w-full sm:w-1/2">
                                <label class="block mb-1 text-left" for="formInput_details">Detalles</label>
                                <textarea  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
<<<<<<< HEAD
                                          placeholder="Escribir aquí" id="formInput_details"  name="description" ></textarea>
=======
                                          placeholder="Escribir aquí" id="formInput_details"  name="details" ></textarea>
>>>>>>> master
                            </div>
{{--                            <div class="w-full px-2 md:w-1/4 sm:w-1/2">--}}
{{--                                <label class="block mb-1 text-center" for="formInput_dateStart"> Fecha Inicio</label>--}}
{{--                                <input--}}
{{--                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"--}}
{{--                                    type="date"--}}
{{--                                    id="formInput_dateStart" name="date_start"/>--}}
{{--                            </div>--}}
{{--                            <div class="w-full px-2 md:w-1/4 sm:w-1/2">--}}
{{--                                <label class="block mb-1 text-center" for="formInput_dateEnd"> Fecha Fin</label>--}}
{{--                                <input--}}
{{--                                    class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"--}}
{{--                                    type="date"--}}
{{--                                    id="formInput_dateEnd" name="date_end"/>--}}
{{--                            </div>--}}
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                // let row_number = 1;
                // $("#add_row").click(function(e){
                //     e.preventDefault();
                //     let new_row_number = row_number - 1;
                //     $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                //     $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                //     row_number++;
                // });
                //
                // $("#delete_row").click(function(e){
                //     e.preventDefault();
                //     if(row_number > 1){
                //         $("#product" + (row_number - 1)).html('');
                //         row_number--;
                //     }
                // });

                let i = 0;
                $("#add_sale").click(function () {
                    ++i;
                    $("#products_table").append('' +
                        '<tr>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="number"  class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"' +
                        'name="products[' + i + '][quantity]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="text" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" ' +
                        'name="products[' + i + '][product]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200">' +
                        '<input type="number" class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" ' +
                        'name="products[' + i + '][price]" />' +
                        '</td>' +
                        '<td class=" px-4 py-2 whitespace-no-wrap border-b border-gray-200" >' +
                        '<svg class="h-8 w-8 text-red-500 remove_sale"  fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                        ' <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>' +
                        ' </svg>' +
                        '</td>' +
                        '</tr>'
                    );
                    $('.select2-multiple').select2({
                        placeholder: "Seleccione",
                        allowClear: true
                    });
                });
                $(document).on('click', '.remove_sale', function () {
                    $(this).parents('tr').remove();
                });

                $('.select2-multiple').select2({
                    placeholder: "Seleccione",
                    allowClear: true
                });
            });
        </script>
    @endsection
</x-app-layout>
