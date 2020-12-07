@extends('partials.layout')

@section('content')
@include('partials.menu')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>IFRS - Posts</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            @include('partials.errors')

            @if($post->id)
            <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @else
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @endif

                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Título</label>
                        <textarea name="title" id="title" rows="5" class="form-control" placeholder="Digite o Título do post">{{ $post->description }}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Selecione...</option>
                            @foreach($categories as $category)
                                @if($category->id == $post->category_id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="post_date">Data</label>
                        <input type="date" name="post_date" id="post_date" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="summary">Sumário</label>
                        <input type="text" name="summary" id="summary" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="text">Texto</label>
                        <input type="text" name="text" id="text" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>

            </form>
        </div>
    </div>
</div>
@endsection