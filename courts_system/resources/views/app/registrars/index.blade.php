@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.registrars.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Registrar::class)
                        <a
                            href="{{ route('registrars.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.MIDNumber')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.Rank')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.Name')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.fieldType')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.city')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.state')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.courtID')
                            </th>
                            <th class="text-left">
                                @lang('crud.registrars.inputs.court_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrars as $registrar)
                        <tr>
                            <td>{{ $registrar->MIDNumber ?? '-' }}</td>
                            <td>{{ $registrar->Rank ?? '-' }}</td>
                            <td>{{ $registrar->Name ?? '-' }}</td>
                            <td>{{ $registrar->fieldType ?? '-' }}</td>
                            <td>{{ $registrar->address ?? '-' }}</td>
                            <td>{{ $registrar->city ?? '-' }}</td>
                            <td>{{ $registrar->state ?? '-' }}</td>
                            <td>{{ $registrar->courtID ?? '-' }}</td>
                            <td>
                                {{ optional($registrar->court)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $registrar)
                                    <a
                                        href="{{ route('registrars.edit', $registrar) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $registrar)
                                    <a
                                        href="{{ route('registrars.show', $registrar) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $registrar)
                                    <form
                                        action="{{ route('registrars.destroy', $registrar) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $registrars->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
