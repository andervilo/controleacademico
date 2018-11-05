@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Verificar Cobertura
        </h1>
   </section>
   <div class="content">
       <form>
            <div class="form-group">
                <label for="exampleInputFile">Verificar cobertura</label>
                <input type="file" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
      </form>
   </div>
@endsection