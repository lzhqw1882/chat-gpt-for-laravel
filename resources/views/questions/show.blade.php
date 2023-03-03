@extends('layouts.app')

@section('javascript')
    <script type="text/javascript">
        window.onload   = function() {
            document.getElementById('btn-move-question').addEventListener('click', function () {
                location.href   = '/questions';
            })
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{$row->title}}</div>

                    <div class="card-body">
                        <p>{!! nl2br($row->description) !!}</p>
                    </div>
                </div>
            </div>
        </div>

        @foreach($row->replies as $reply)
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$reply->writer_name}}의 답변입니다.</div>

                    <div class="card-body">
                        <p>{!! nl2br($reply->description) !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="row justify-content-center mt-2">
            <button type="button" id="btn-move-question" class="btn btn-primary">목록</button>
        </div>
    </div>
@endsection
