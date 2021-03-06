@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted:
                                {{ $thread->title }}
                            </span>

                            @can('update', $thread)
                                <form action="{{ $thread->path() }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>

                @foreach ($replies as $reply)
                    @include('threads.reply')
                @endforeach
                 <div class="mt-5">
                     {{ $replies->links() }}
                 </div>

                @if (auth()->check())
                    <form method="post" action="{{ $thread->path() . '/replies' }}" class="mt-5">
                        {{ csrf_field() }}
                        <div class="form-group">
                    <textarea name="body" id="body" rows="5" class="form-control"
                              placeholder="Have something to say?"></textarea>
                            <button type="submit" class="btn btn-outline-secondary mt-3">Post</button>
                        </div>
                    </form>
                @else
                    <p class="text-center mt-3">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a>, and currently
                            has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
