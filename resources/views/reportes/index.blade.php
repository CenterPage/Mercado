@extends('admin.layout')

@section('content')
<div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador', 'comerciante']))
        <div class="accordion" id="accordionExample">
            <div class="card-header" >
                <div class="btn btn-primary text-left d-inline" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span id="headingOne">Reporte Deudas</span>
                </div>
                <div class="btn btn-primary d-inline" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span id="headingTwo">Reporte Pagos</span>
                </div>
                <div class="btn btn-primary d-inline" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <span id="headingThree">Reporte Pago Anticipados</span>
                </div>
                <div class="btn btn-primary d-inline" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <span id="headingFour">Reporte Promociones</span>
                </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Generar Reporte Deudas',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.deuda'
                        ])
                </div>
            </div>
            <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Generar Reporte Pagos',
                            'placeholder' => 'Agosto',
                            'link' => 'reporte.pago'
                        ])
                </div>
            </div>
            <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    @include('partials.search-reporte', [
                            'title' => 'Generar Reporte Promociones',
                            'placeholder' => 'Ejemplo 2020-08-26',
                            'link' => 'reporte.promocion'
                        ])
                </div>
            </div>
            <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">

            </div>
        </div>
    @else
        <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
    @endif











</div>
@endsection
