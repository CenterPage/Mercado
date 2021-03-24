@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mt-3">
                    <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                        <span class="w-100">
                            {{ $puesto->user->name }} {{ $puesto->user->apellido }} <strong>-</strong> Puesto {{ $puesto->num_puesto }}
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('puestos.pagos.store', $puesto) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right font-weight-normal">Fecha</label>

                                <div class="col-md-6">
                                    <input id="datepicker" type="text" class="form-control datepicker @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required readonly>

                                    @error('fecha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="monto_sisa" class="col-md-4 col-form-label text-md-right font-weight-normal">Sisa Diaria</label>

                                <div class="col-md-6">
                                    <input id="monto_sisa" type="text" class="form-control @error('monto_sisa') is-invalid @enderror" name="monto_sisa" value="{{ $puesto->sisa_diaria }}" required autocomplete="monto_sisa" autofocus readonly>

                                    @error('monto_sisa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

{{--                             <div class="form-group row">
                                <label for="tipo_id" class="col-md-4 col-form-label text-md-right font-weight-normal">Tipo Pago</label>

                                <div class="col-md-6">
                                    <select class="form-control select2" name="tipo_id">
                                        @foreach($tipos as $tipo)
                                            @if ($tipo->nombre == 'Pago')
                                                <option class="" value="{{ $tipo->id }}">
                                                    {{ $tipo->nombre }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('tipo_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="num_recibo" class="col-md-4 col-form-label text-md-right font-weight-normal"># Recibo</label>

                                <div class="col-md-6">
                                    <input id="num_recibo" type="text" class="form-control @error('num_recibo') is-invalid @enderror" name="num_recibo" value="{{ mt_rand(0, 9999999999) }}" readonly autocomplete="num_recibo" autofocus>

                                    @error('num_recibo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <p style='cursor: pointer;' onClick="muestra_oculta('contenido')"
                                        class="col-md-4 col-form-label text-md-right font-weight-normal text-secondary"><u>Ver más</u>
                                    </p>
                                </div>
                                <div class="mt-2">
                                    <a class="d-block text-secondary" href="">Ir a Deuda</a>
                                </div>
                            </div>

                            <div id="contenido">

                                <div class="form-group row">
                                    <label for="monto_remodelacion" class="col-md-4 col-form-label text-md-right font-weight-normal">M. Remodelación</label>

                                    <div class="col-md-6">
                                        <input id="monto_remodelacion" type="text" class="form-control @error('monto_remodelacion') is-invalid @enderror" name="monto_remodelacion" value="{{ old('monto_remodelacion') }}"autocomplete="monto_remodelacion" autofocus>

                                        @error('monto_remodelacion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="monto_constancia" class="col-md-4 col-form-label text-md-right font-weight-normal">M. Constancia</label>

                                    <div class="col-md-6">
                                        <input id="monto_constancia" type="text" class="form-control @error('monto_constancia') is-invalid @enderror" name="monto_constancia" value="{{ old('monto_constancia') }}" autocomplete="monto_constancia" autofocus>

                                        @error('monto_constancia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="monto_agua" class="col-md-4 col-form-label text-md-right font-weight-normal">M. Agua</label>

                                    <div class="col-md-6">
                                        <input id="monto_agua" type="text" class="form-control @error('monto_agua') is-invalid @enderror" name="monto_agua" value="{{ old('monto_agua') }}" autocomplete="monto_agua" autofocus>

                                        @error('monto_agua')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar Pago
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-secondary text-white">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection