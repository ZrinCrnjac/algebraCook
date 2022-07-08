@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>
                <div class="panel-body">
                @include('common.errors')
                    <section>
                        <h3>Uredi zaporku:</h3>
                        <form action="{{url('profil')}}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Nova zaporka</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save"></i>Uredi zaporuku
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                    @if(session()->has('flash_notification.message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('flash_notification.message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection