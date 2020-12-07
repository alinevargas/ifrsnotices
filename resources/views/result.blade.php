@extends('partials.layout')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>LaraQuiz</h1>
            <p class="lead">Faça aqui simulados para o ENEM e vestibular</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <p class="lead">Você acertou {{ $total }} de {{ $count }} questões!</p>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($posts as $i => $post)
            <div class="col-12">
                @if($post->correct)
                    <p class="text-success">
                        {{ ($i + 1) }} . {{ $post->description }}
                        <br>
                        <strong>Resposta correta: {{ $post->options()->where('correct', true)->first()->description }}</strong>
                    </p>
                @else
                    <p class="text-danger">
                        {{ ($i + 1) }} . {{ $post->description }}
                        <br>
                        <strong>Resposta correta: {{ $post->options()->where('correct', true)->first()->description }}</strong>
                    </p>
                @endif
                <hr>
            </div>
        @endforeach
        <a href="{{ route('home') }}" class="btn btn-success mb-5">Voltar para a página inicial</a>
    </div>
</div>
@endsection
