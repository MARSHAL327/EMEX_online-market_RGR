@extends('layouts.app')

@section('title-block')
    @lang('maintenance.spare_parts_for_maintenance')
@endsection

@section('content')
    <section>
        <div class="section-title">
            <span class="section-title__text">
                @lang('maintenance.spare_parts_for_maintenance')
            </span>
            <div class="section-title__hr"></div>
            <div class="section-title__more"></div>
        </div>
    </section>

    <section>
        <div class="maintenance-progress">
            <ul>
                <li class="maintenance-progress__item maintenance-progress__item_checked">
                    <a href="{{ route('maintenance_brands') }}">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">done</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            {{ $brandData->name }}
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item active">
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle">
                            <span class="material-icons">arrow_downward</span>
                        </div>
                        <div class="maintenance-progress__item__text">
                            @lang('maintenance.model_select')
                        </div>
                        <div class="maintenance-progress__item__next-item">
                            <span class="material-icons">arrow_forward</span>
                        </div>
                    </a>
                </li>
                <li class="maintenance-progress__item">
                    <a href="javascript:void(0)">
                        <div class="maintenance-progress__item__circle"></div>
                        <div class="maintenance-progress__item__text">
                            @lang('maintenance.modification_select')
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="white-block">
            <div class="auto-model">
                <ul>
                    @foreach($autoModels as $autoModel)
                        <li class="auto-model__item">
                            <a href="{{
                                route('maintenance_modification', [
                                    'id_brand' => $brandData->id,
                                    'id_model' => $autoModel->id])
                                }}">{{ $autoModel->name }}
                            </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
