@extends('layouts.blogs')

@section('main')
<article>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 align-content-center">
                <!-- Row -->
                <div class="row">
                    <div class="container">
                        {{ the_post() }}
                        <p>
                            {{ the_content() }}
                        </p>
                    </div>
                </div>
                <!-- Row -->
            </div>
        </div>
    </div>
</article>
@endsection