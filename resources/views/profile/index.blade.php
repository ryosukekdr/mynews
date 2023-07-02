{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- admin.blade.phpの@yield('title')に'My プロフィール'を埋め込む --}}
@section('title', 'My プロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                 <h2>My プロフィール</h2>
                {{--<form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif--}}
                    <div class="form-group row">
                        <label class="col-md-2">氏名(name)</label>
                        <div class="col-md-10">
                            {{ Str::limit($posts[0]->name, 150) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-md-10">
                            {{ Str::limit($posts[0]->gender, 150) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味(hobby)</label>
                        <div class="col-md-10">
                            {{ Str::limit($posts[0]->hobby, 150) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            {{ Str::limit($posts[0]->introduction, 1500) }}
                        </div>
                    </div>
                    @csrf
                    {{--<input type="submit" class="btn btn-primary" value="更新">
                </form>--}}
            </div>
        </div>
    </div>
@endsection