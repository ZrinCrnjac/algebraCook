@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dodajte novi recept
            </div>
        @include('common.errors')
            <div class="panel panel-default">
                <div class="panel-body">

                <form action="{{ url('recipes/add')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="recipe-name" class="col-sm-3 control-label">Ime</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="recipe-name" class="form-control" >
                        </div>
                    <label for="recipe-decsription" class="col-sm-3 control-label">Opis</label>
                        <div class="col-sm-6">
                            <input type="text" name="description" id="recipe-description" class="form-control" >
                        </div>
                    <label for="recipe-image" class="col-sm-3 control-label">Slika</label>
                        <div class="col-sm-6">
                            <input type="file" name="image" id="recipe-image" class="form-control" >
                        </div>
                    <h3>Popis sastojaka:</h3>
                    <div id="ing-coll-fields">
	                    <div class="form-group">
	                        <label for="ingredient">Sastojak: <input name="ingredient[]" type="text"/></label>
	                    </div>
                    </div>
                    <a href="#" id="addLnk"><i class="fa fa-btn fa-plus"></i>Dodaj novi sastojak</a><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-save"></i>Stvori novi recept
                    </button>
                </form>
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