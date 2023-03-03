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
                    <div class="card-header">Ask something to ChatGPT</div>

                    <div class="card-body text-center">
                        <button type="button" id="btn-move-question" class="btn btn-primary">질문 목록으로 이동</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
