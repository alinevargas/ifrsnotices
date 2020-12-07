@extends('partials.layout')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1>IFRS Notices</h1>
            <p class="lead">Notícias do IFRS</p>
        </div>
    </div>
    <form class="row mt-3" action="{{ route('result') }}" method="POST">
        {{ csrf_field() }}
        @foreach($posts as $i => $post)
            <div class="col-12">
                <h3>{{ ($i + 1) }} . {{ $post->title }}</h3>
                <p>{{ ($i + 1) }} . {{ $post->text }}</p>
                
                <hr>
            </div>
        @endforeach
        <div class="col-12 mb-5">
        </div>
    </form>
</div>
@endsection
