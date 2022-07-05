@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Recepti
            </div>
        @include('common.errors')
        @if (count($recipes)>0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">Dodaj novi recept</a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <tbody>
                            @foreach ($recipes as $recipe)
                                <tr>
                                    <td class="table-text"><a href="#">{{$recipe->name}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
    </div>
</div>
@endsection