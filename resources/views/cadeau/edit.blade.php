@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modifier  cadeau {{ $cadeau->nom }}</h1>

            <form enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" value="{{ $cadeau->nom }}" name="nom" class='form-control' id="nom">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if(!empty($cadeau->image))
                    <br/>
                        <img src='{{ Storage::url($cadeau->image) }}' height="100" />
                        <br/>
                        <div class='clearfix'>&nbsp;</div>

                    @endif
                    <input type="file" name="image" class='form-control' accept="image/*" id="image">
                </div>

                <div class="form-group text-right">
                    <button class='btn btn-primary btn-sm'>Ajouter</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
