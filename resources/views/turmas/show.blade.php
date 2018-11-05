@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turmas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('turmas.show_fields')
                    <a href="{!! route('turmas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
