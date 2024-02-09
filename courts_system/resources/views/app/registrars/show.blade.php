@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('registrars.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.registrars.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.MIDNumber')</h5>
                    <span>{{ $registrar->MIDNumber ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.Rank')</h5>
                    <span>{{ $registrar->Rank ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.Name')</h5>
                    <span>{{ $registrar->Name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.fieldType')</h5>
                    <span>{{ $registrar->fieldType ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.address')</h5>
                    <span>{{ $registrar->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.city')</h5>
                    <span>{{ $registrar->city ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.state')</h5>
                    <span>{{ $registrar->state ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.courtID')</h5>
                    <span>{{ $registrar->courtID ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.registrars.inputs.court_id')</h5>
                    <span>{{ optional($registrar->court)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('registrars.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Registrar::class)
                <a
                    href="{{ route('registrars.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
