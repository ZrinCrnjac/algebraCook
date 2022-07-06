@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel heading">
                    Uredi recept
                </div>

                <div class="panel-body">
                    @include('common.errors')

                    <form action="{{url('recipes/' . $recipe)}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="recipe-name" class="col-sm-3 control-label">Ime</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="recipe-name" class="form-control" value="{{ old('recipe') ? old('recipe') : $recipe->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipe-description" class="col-sm-3 control-label">Opis</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="recipe-description" class="form-control" value="{{ old('recipe') ? old('recipe') : $recipe->description }}">
                            </div>
                        </div>
                        
                        <h3>Popis sastojaka</h3>
                        <div id="ing-coll-fields">
                            @foreach($recipe->ingredients as $ingredient)
                            <div class="form-group">
                                <label for="ingredient">Sastojak: <input name="ingredient[]" type="text" value="{{$ingredient->name}}"/></label>
                                <a href="#" class="remScnt"><i class="fa fa-btn fal-close"></i>Makni sastojak</a>
                            </div>
                            @endforeach
                        </div>

                        <a href="#" id="addLnk"><i class="fa fa-btn fa-plus"></i>Dodaj novi sastojak</a>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>Uredi recept
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(function() {
        var scntDiv = $('#ing-coll-fields');
        var i = $('#ing-coll-fields div').length + 1;

        $('#addLnk').click(function() {
                $('<div class="form-group">'+
                	'<label for="ingredient">Sastojak: <input name="ingredient[]" type="text"/></label>'+
                    '<a href="#" class="remScnt">'+
                        '<i class="fa fa-btn fa-close"></i>Makni sastojak'+
                    '</a></div>').appendTo(scntDiv);
                i++;
                return false;
        });

        scntDiv.on('click', '.remScnt', function() {
                if( i > 2 ) {
                        $(this).parents('div .form-group').remove();
                        i--;
                }
                return false;
        });
    });
</script>
@endsection