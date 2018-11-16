@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ajouter un cadeau</h1>

            <form enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class='form-control' id="nom">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
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
