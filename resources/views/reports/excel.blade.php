<table>
    <thead>
    <tr>
        <th> N°</th>
        <th> Fecha</th>
        <th> Detalle</th>
        <th> Ruc</th>
        <th> Autorización</th>
        <th> Proveedor</th>
        <th> Clasificación</th>
        <th> Cantidad</th>
        <th> Costo Unitario</th>
        <th> Costo Total</th>
        <th> IVA</th>
        <th> Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports['report'] as $purchase_detail)
        <tr>
            <td> {{$purchase_detail->purchase->id}}</td>
            <td> {{$purchase_detail->purchase->date}}</td>
            <td> {{$purchase_detail->detail->detail}}</td>
            <td> {{$purchase_detail->purchase->supplier->ruc}}</td>
            <td> {{$purchase_detail->purchase->authorization}}</td>
            <td> {{$purchase_detail->purchase->supplier->name}}</td>
            <td> {{$purchase_detail->detail->classification->name}}</td>
            <td> {{$purchase_detail->quantity}}</td>
            <td> {{$purchase_detail->detail->unit_value}}</td>
            <td> {{$purchase_detail->total_value}}</td>
            <td> {{$purchase_detail->tax->name}}</td>
            <td> {{$purchase_detail->total}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td>Total</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> {{$reports['sum_reports']}}</td>
    </tr>
    </tfoot>
</table>
