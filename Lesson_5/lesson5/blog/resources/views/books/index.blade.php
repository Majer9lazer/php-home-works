@extends('layouts.app')

@section('content')
<div class="container">
    {{ csrf_field() }}
    <div class="row">
        @if ($errors->has('id'))
            {{ $errors->first('id') }} /

        @endif
        <div class="col-md-8 col-md-offset-2">
            <div id="panel" class="panel panel-default">
                <div class="panel-heading">
                    Список книг
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                    <pre>
                        (\____/)
                        ( ͡ ͡° ͜ ʖ ͡ ͡°)
                        \╭☞ \╭☞
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        $.get(
            'books/getBooks',
            function(data) {
                for (var i in data) {
                    $('#panel').append(
                        '<div class="panel-heading">'
                        + data[i].id + ' / ' + data[i].name + ' / '
                        + '<button class="btn remove btn-danger" data-id='
                        + data[i].id + '>Удалить</button>'
                        + '</div>'
                    );
                }
            },
            'json'
        );

        $('#panel').on('click', '.remove', function() {
            var $this = $(this)

            $.post(
                'book/' + $this.data('id'),
                {'_token': $('[name="_token"]').attr('value')},
                function(data) {
                    if (data.status === 'error') {
                        return
                    }

                    alert(data.message)

                    $this.closest('.panel-heading').remove()
                },
                'json'
            );
        })

    });
</script>
@endsection
