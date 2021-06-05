@extends('layout')

@section('page')
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto mt-10 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Login</h1>
                <form action="{{ route('authentication.login') }}" method="POST">
                    @csrf
                    @error('email')
                        <div class="xl:text-red-500"> {{$message}} </div>
                    @enderror
                    <input
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Email"/>
                    @error('password')
                    <div class="xl:text-red-500"> {{$message}} </div>
                    @enderror
                    <input
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password"/>
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-green-400 to-blue-500  text-center py-3 rounded bg-green text-white hover:bg-green-dark focus:outline-none my-1"
                    >Login
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection