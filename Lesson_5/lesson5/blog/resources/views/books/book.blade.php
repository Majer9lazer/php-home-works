@extends('layouts.app')

@section('content')
<div class="container">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="panel" class="panel panel-default">
                <div class="panel-heading">
                    Книга {{ $book->name }}
                </div>
                {{ $book->author }}
            </div>
        </div>
    </div>
</div>
@endsection
