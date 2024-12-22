@extends('frontend.layouts.master')

@section('title','E-Shop || Login Page')

@section('main-content')
    {{-- <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Login</h2>
                        <p>Please register in order to checkout more quickly</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Email<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Password<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">Login</button>
                                        <a href="{{route('register.form')}}" class="btn">Register</a>
                                        OR
                                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>

                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Remember me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password.reset') }}">
                                            Lost your password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login --> --}}
    <h1>Chat with AI</h1>
    <div id="chat-box">
        <!-- Tin nhắn sẽ được hiển thị ở đây -->
    </div>
    <input type="text" id="message-input" placeholder="Send a message...">
    <button id="send-button">Send</button>

    <script>
        document.getElementById('send-button').addEventListener('click', function() {
            const messageInput = document.getElementById('message-input');
            const message = messageInput.value;

            // Gửi yêu cầu đến API để gửi tin nhắn
            fetch('http://127.0.0.1:5000/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: message }),
            })
            .then(response => response.json())
            .then(data => {
                // Hiển thị tin nhắn trong khung chat
                const chatBox = document.getElementById('chat-box');
                chatBox.innerHTML += `<div>${data.response}</div>`;
                messageInput.value = ''; // Xóa ô nhập sau khi gửi
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
@push('styles')
<style>
    #chat-box {
            border: 1px solid #ccc;
            height: 400px;
            overflow-y: scroll;
            padding: 10px;
            margin-bottom: 10px;
        }
        #message-input {
            width: 80%;
            padding: 10px;
        }
        #send-button {
            padding: 10px;
        }
</style>
@endpush