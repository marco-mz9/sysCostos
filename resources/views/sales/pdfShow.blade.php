{{--

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

hola soy tu padre
<div class="py-12">
    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
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
                        <label class="block mb-1" for="formInput_dateEnd">Detalle</label>
                        <p>
                            @foreach($orders->products as $item)
                                {{ $item->product }}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
--}}


    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ env('APP_URL') }}/resources/views/images/EPS_logo.png"
                                 style="width: 100%; max-width: 300px"/>
                        </td>

                        <td>
                            Orden De Producción # : {{$orders->id}}<br/>
                            Fecha de expedición de la Orden : {{$orders->date_start}}<br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Datos sobre el producto a fabricar<br/>
                            Articulo :
                            @foreach($orders->products as $item)
                                {{ $item->product }}
                            @endforeach<br/>
                            Fecha deInicio : {{$orders->date_start}}<br/>
                            Pedido N° : {{$orders->sale->id}}
                        </td>

                        <td>
                            <br/>
                            Cantidad :
                            @foreach($orders->products as $item)
                                {{ $item->pivot->quantity }}
                            @endforeach<br/>
                            Fecha de Culminación : {{$orders->date_end}} <br/>
                            Especificaciones
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="heading">
            <td>Producto</td>
            <td>Unidades</td>
            <td>Total</td>
            <td>Costo Unitario</td>
        </tr>

        <tr class="item">
            <td>
                @foreach($orders->products as $item)
                    {{ $item->product }}
                @endforeach
            </td>
            <td>
                @foreach($orders->products as $item)
                    {{ $item->pivot->quantity }}
                @endforeach<br/>
            </td>
            <td>
                @foreach($orders->products as $item)
                    ${{ $item->price }}
                @endforeach
            </td>
        </tr>
        <tr class="total">
            <td></td>


            <td>Total: $385.00</td>
        </tr>
    </table>
</div>
</body>
</html>
