<x-app-layout>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flow-root ">
                        <a href="{{ route('sales.index') }}"
                           class="float-right text-white m-3 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <label> Atras</label>
                        </a>
                        <div class="d-flex justify-content-end mb-4">
                            <a class="btn btn-primary" href="{{route('sales.pdfOrder',$orders->id)}}">
                                {{__('Export to PDF')}}
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-wrap mx-5 space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/4">
                            <label class="block mb-1" for="formInput_client_name">Orden</label>
                            <p>{{$orders->id}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4">
                            <label class="block mb-1" for="formInput_client_name">Cliente</label>

                            <p>{{$orders->client->name}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_ruc">RUC</label>
                            <p>{{$orders->client->ruc}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateStart"> Fecha Inicio</label>
                            <p>{{$orders->date_start}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd"> Fecha Fin</label>
                            <p>{{$orders->date_end}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd"> Pedido</label>
                            <p>{{$orders->sale->id}}</p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd">Producto</label>
                            <p>
                                @foreach($orders->products as $item)
                                    {{ $item->product }}
                                @endforeach
                            </p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd"> Cantidad</label>
                            <p>
                                @foreach($orders->products as $item)
                                    {{ $item->pivot->quantity }}
                                @endforeach
                            </p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd"> Detalle</label>
                            <p>
                                @foreach($orders->products as $item)
                                    @foreach($item->details as $value)
                                        {{ $value->detail }}
                                    @endforeach
                                @endforeach
                            </p>
                        </div>
                        <div class="w-full px-2 md:w-1/4 sm:w-1/2">
                            <label class="block mb-1" for="formInput_dateEnd"> Clasificación</label>
                            <p>
                                @foreach($orders->products as $item)
                                    @foreach($item->details as $value)
                                        {{ $value->classification->name}}
                                    @endforeach
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
        </script>
    @endsection
</x-app-layout>

