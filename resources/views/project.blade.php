@extends('layouts.app')

@section('content')
    <h1 class="container">tabella personale</h1>

    <div class="container">
        <div class="row">
                @foreach ($projects as $elem)
                <div class="col-2">
                    <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">{{$elem->title}} </h4>
                            </a>
                            
                            <p class="card-text">{{ $elem->content }}</p>
                        </div>
                    </div>
                </div>

                @endforeach
        </div>
    </div> 
@endsection  