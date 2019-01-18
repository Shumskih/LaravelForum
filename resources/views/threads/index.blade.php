@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($threads as $thread)
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </h4>

                                <a href="#">{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</a>
                            </div>
                        </div>

                        <div class="card-body">
                                <div class="body">{{ $thread->body }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <p>There are no relevant results at this time</p>
            @endforelse
        </div>
    </div>
@endsection
