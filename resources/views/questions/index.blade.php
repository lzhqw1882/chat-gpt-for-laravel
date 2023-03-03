@extends('layouts.app')

@section('javascript')
    <script type="text/javascript">
        window.onload   = function() {
            document.getElementById('btn-move-write').addEventListener('click', function () {
                location.href   = '/questions/create';
            })
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">목록</div>

                    <div class="card-body">

                        <button type="button" id="btn-move-write" class="btn btn-primary">질문하기</button>

                        @foreach($rows as $row)
                        <div class="list-group mt-2">
                            <a href="/questions/{{$row->seq}}" class="list-group-item list-group-item-action" aria-current="true" data-seq="">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$row->title}}</h5>
                                    <small>{{$row->created_at}}</small>
                                </div>
                                <small>{{$row->description}}</small>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
