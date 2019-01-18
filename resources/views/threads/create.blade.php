@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Thread</div>

                    <div class="card-body">
                        <form action="/threads" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="channel_id">Choose a Channel:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Choose One...</option>
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea name="body" class="form-control" id="body" rows="8" required>{{ old('body') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                        @if (count($errors))
                            <div class="alert alert-danger mt-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection