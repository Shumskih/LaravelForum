@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pb-2 mt-4 mb-5 border-bottom">
                    <h1>
                        {{ $profileUser->name }}
                    </h1>
                </div>
                @foreach ($activities as $date => $activity)
                    <h3 class="pb-2 mt-4 mb-3">{{ $date }}</h3>
                    @foreach ($activity as $record)
                        @include("profiles.activities.{$record->type}", ['activity' => $record])
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection