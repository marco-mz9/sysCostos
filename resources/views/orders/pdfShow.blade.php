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


        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
    <title></title>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ env('APP_URL') }}/resources/views/images/EPS_logo.png"
                                 style="width: 100%; max-width: 300px" alt=""/>
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
