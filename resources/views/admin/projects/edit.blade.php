@extends('layouts.app')

@section('content')

<div class="container">
    <h2>modifica card</h2>
    
            <div class="row justify-content-center">
                <div class="col-7">
                    <form action="{{ route('project.update', $project ) }}" method="POST">
                     
                      @csrf
                      @method('PUT')
    
                        <div>
                            <label for="title">Titolo</label>
                            <input class="form-control" @error('title') is-invalid  @enderror type="text" id="title" name="title" value="{{ old('title') ?? $project->title }}" >
                             @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     
                        <div>
                            <label for="content">Content</label>
                            <textarea class="form-control" @error('content') is-invalid  @enderror name="content" id="content" rows="10">{{ old('content') ?? $project->content }}</textarea>
                             @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror 
                        </div>

                        <div>
                            <label for="slug">Slug</label>
                            <input class="form-control" @error('slug') is-invalid  @enderror type="text" id="slug" name="slug" value="{{ old('slug') ?? $project->slug }}" >
                             @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                 
                        <button class="btn btn-success" type="submit">Salva modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







@endsection