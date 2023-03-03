@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">무엇이든 물어보세요.</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.store') }}">
                            <input type="hidden" name="writer_name" value="글쓴이" />
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control text-left" name="title" placeholder="제목" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control text-left" name="description" placeholder="Ask something..." rows="20"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">질문 등록</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
