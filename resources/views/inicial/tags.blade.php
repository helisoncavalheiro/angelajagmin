@extends('layouts.home')

@section('content')
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <h3>Categorias</h3>
                </div>
                <div class="row">
                    @foreach($tags as $tag)
                        <div class="col s12 m3">
                            <div class="card grey lighten-5">
                                <div class="card-content black-text">
                                    <span class="card-title">{{ $tag->name }}</span>
                                    <p class="valign-wrapper">
                                        <i class="material-icons tiny left">description</i> {{ $postCounter[$tag->id] }}
                                        @if($postCounter[$tag->id] > 1)
                                            Publicações
                                        @else
                                            Publicação
                                        @endif
                                    </p>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col s6">
                                            <a class="blue-text valign-wrapper"
                                               href="{{ action('Home\TagController@showPostsByTag', ['id' => $tag->id]) }}">
                                                Ver publicações
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    <script src="{{ secure_asset('assets/home/js/script.js') }}"></script>
@endsection
