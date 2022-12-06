<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="space-y-4 text-gray-700" action="{{ route('reports.sale') }}" method="GET">
                    <div class="flex flex-wrap justify-center mx-5 space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/3 sm:w-1/2">
                            <label class="block mb-1 text-center" for="datestart"> Fecha Desde</label>
                            <input
                                class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                type="date"
                                id="date_start" name="date_start"/>
                        </div>
                        <div class="w-full px-2 md:w-1/3 sm:w-1/2">
                            <label class="block mb-1 text-center" for="date_end"> Fecha Hasta</label>
                            <input
                                class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                                type="date"
                                id="date_end" name="date_end"/>
                        </div>
                        <div class="w-full px-2 md:w-1/3 sm:w-1/2">
                            <label class="block mb-1 text-center" for="select_class"> Clasificación</label>
                            <select
                                class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                name="select_class" id="select_class">
                                @foreach($classification as $value)
                                    <option value="{{ $value->name }}">{{ $value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-center ">
                        <button type="submit"
                                class="text-white m-3 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                            <i class="fas fa-search"> </i> Buscar
                            {{--                            <i class="fas fa-search"> </i> Buscar--}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // $(document).ready(function(){
            //     $(function (){
            //         $("#select_class").on('change',onSelectClassChange)
            //     });
            //
            //     function onSelectClassChange(){
            //         let class_id = $(this).val();
            //         let dateStart= $( "#dateStart" ).val();
            //         let dateEnd= $( "#dateEnd" ).val();
            //         alert(class_id)
            //         alert(dateStart)
            //         alert(dateEnd)
            //     }
            // });
        </script>
    @endsection
</x-app-layout>

