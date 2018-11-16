@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des cadeaux</h1>
            <a href="{{ route('cadeau.add') }}" class='btn btn-sm btn-primary'>Ajouter un cadeau</a>
            <div class='clearfix'>&nbsp;</div>
            <form method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Fichier CSV</label>
                    <input type="file" name="csv" class='form-control' >    
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <select class='form-control' name="type_add">
                        <option value="">---Type---</option>
                        <option value="add">Ajouter à la liste</option>
                        <option value="radd">Supprimer tous et ajouter ce fichier</option>
                    </select>
                    
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Uploader</button>
                </div>
                
                
            </form>
            <div class='clearfix'>&nbsp;</div>
            <table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>CODE</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Date de création</th>
                    <th>Date de modification</th>
                    <th>Action</th>
                </tr>




            </thead>

            <tbody>
                @if(count($cadeaux) == 0)
                <tr><td colspan="6" class='alert alert-warning text-center'>Aucun element trouver</td></tr>
                @endif
            @foreach($cadeaux as $cadeau)
              <tr>
                    <td>{{ $cadeau->code }}</td>
                    <td>{{ $cadeau->nom }}</td>

                    <td><img src='{{ Storage::url($cadeau->image) }}' style="max-width:100%;" /></td>
                    <td>{{ date('d/m/Y H:i',strtotime($cadeau->created_at)) }}</td>
                    <td>{{ date('d/m/Y H:i',strtotime($cadeau->updated_at)) }}</td>
                    <td>
                        <a href="{{ route('cadeau.edit',$cadeau->id)}}" class='btn btn-sm btn-success'>Edit</a><br/>
                        <a href="#" data-id="{{ $cadeau->id }}" class='btn btn-sm btn-warning remove'>Remove</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    jQuery(function($){
        $(document).on('click','.remove',function(e){
            e.preventDefault();
            var id = $(this).data('id')
            $.ajax({
                url:'{{ route("cadeau.delete") }}',
                data:{
                    id:id,
                    _token:'{{ csrf_token() }}',
                    _method:'DELETE'
                },
                type:'POST',
                success:function(data){
                    if(data == "ok")
                        window.location.reload();
                }
            })

            return false;
        });
    })
</script>
@endsection
