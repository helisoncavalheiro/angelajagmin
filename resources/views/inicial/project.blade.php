@extends('layouts.home')

@section('content')
    <link rel="stylesheet" href="{{ secure_asset('assets/home/css/project.css') }}">
    <main class="section">

        <div class="row">
            <!--
            <div class="col m2 show-on-medium-and-up hide-on-small-and-down">
                <div class="card-panel">
                    <span class="">
                        <h6 class="left-align"><b>Arquivos para Download</b></h6>
                    </span>
                    <ul class="card-content">
                        <li class="valign-wrapper"><a href="#">Arquivo 1</a><i class="material-icons right" >file_download</i></li>
                        <li class="valign-wrapper"><a href="#">Arquivo 2</a><i class="material-icons right" >file_download</i></li>
                        <li class="valign-wrapper"><a href="#">Arquivo 3</a><i class="material-icons right" >file_download</i></li>
                        <li class="valign-wrapper"><a href="#">Arquivo 4</a><i class="material-icons right" >file_download</i></li>
                        <li class="valign-wrapper"><a href="#">Arquivo 5</a><i class="material-icons right" >file_download</i></li>
                    </ul>
                </div>
            </div>
            -->
            <div class="col s12 m7 push-m2 ">
                <div class="card-panel">
                    <div class="row">
					<span class="header col s12">
						<h1 class="left-align post-title">{{ $project->title }}</h1>
					</span>
                    </div>
                    <div class="row">
                        <div class=" col s12 m10 push-m1">
                            <img class="responsive-img"
                                 src="{{ secure_asset('storage/' . $project->images->filepath) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <span class="project-content">
                            {{ $project->description }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m10 push-m1">
                            <a href="{{ action('Home\ProjectController@showPostsFromProject', ['id' => $project->id]) }}">
                                <button class="col m12 center btn btn-large blue waves-effect waves-light">Veja as
                                    publicações deste projeto!
                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    <script src="{{ secure_asset('assets/home/js/script.js') }}"></script>
@endsection
