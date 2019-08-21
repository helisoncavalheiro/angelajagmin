@extends('layouts.home')
@section('content')
    <main>
        <div class="container">
            @if(isset($projects))
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col s12 m6">
                            <a href="project/{{$project->id}}">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="responsive-img imagem-projeto"
                                             src="{{ secure_asset('storage/' . $project->images->filepath)}}">
                                    </div>
                                    <div class="card-content">
                                        <span
                                            class="card-title activator grey-text text-darken-4">{{ $project->title }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </main>
    <!-- Scripts -->
    <script src="{{ secure_asset('assets/home/js/script.js') }}"></script>
@endsection
