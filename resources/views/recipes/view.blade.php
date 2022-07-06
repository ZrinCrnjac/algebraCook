@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalji za recept {{$recipe->name}}
                @if(auth()->user()->id == $recipe->creator_id)
                <br><a href="../edit/{{$recipe->id}}">
                    <i class="fa fa-btn fa-pencil"></i>Uredi recept
                </a>
                @endif
            </div>
        @include('common.errors')
            <div class="panel-body">
                <article>
                    <h2>{{ $recipe->name }}</h2>
                    <h4>Sastojci:</h4>
                    <ul class="list-group">
                        @foreach($recipe->ingredients as $ingredient)
                            <li class="list-group-item">{{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
                    <h4>Opis: </h4>
                    <p>{{$recipe->description}}</p>
                    <br>
                    <p>Slika: </p>
                    <img width="200" src="{{ asset('uploads/' . $recipe->image) }}"/>
                </article>
            </div>
    </div>
</div>
@endsection