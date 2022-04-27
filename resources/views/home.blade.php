@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Оставить заявку') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="/home/store" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Ваше имя</label>
                                            <input required type="text" class="form-control" id="name" name="name" placeholder="Как к вам обращаться?">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="phone">Ваш телефон</label>
                                            <input required type="text" class="form-control" id="phone" name="phone" placeholder="Введите ваш рабочий номер телефона">
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="company">Название компании</label>
                                            <input required type="text" class="form-control" id="company" name="company" placeholder="Какую компанию вы представляете?">
                                            @error('company')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="ask-name">Название заявки</label>
                                            <input required type="text" class="form-control" id="ask-name" name="ask-name" placeholder="Введите тему заявку">
                                            @error('ask-name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <input hidden required type="text" class="form-control" id="user_id" name="user_id" value="{{$user = auth()->user()->id}}">
                                            @error('user_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Сообщение</label>
                                            <textarea required class="form-control" id="message" rows="3" placeholder="Опишите проблему" name="message"></textarea>
                                            @error('message')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="file">Изображения</label>
                                            <input required type="file" class="form-control-file" id="file" name="file">
                                            @error('file')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Отправить</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Ваши заявки') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="all-asks col-12">
                                {{--                                                <div class="name-output">--}}

                                @foreach($asks as $item)
                                    <div class="card mt-3">
                                        <div class="card-header">Название заявки: {{$item['ask-name']}}</div>
                                        <div class="card-body">
                                            <div class='container justify-content-center align-items-center'>
                                                <div class="row container justify-content-center align-items-center">Имя: {{$item['name']}}</div>
                                                <div class="row container justify-content-center align-items-center">Номер телефона: {{$item['phone']}}</div>
                                                <div class="row container justify-content-center align-items-center">Компания: {{$item['company']}}</div>
                                                <div class="row container justify-content-center align-items-center">Сообщение: {{$item['message']}}</div>
{{--                                                <div class="row">Файл: {{$item->file}}</div>--}}
                                                <p><img class="mt-3 container justify-content-center align-items-center" src="{{ asset('storage').'/image/asks/origin/'.$item->file }}" alt="12"></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
