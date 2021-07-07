@extends('layout')

@section('page')
    <div class="flex justify-center text-4xl">Subscribe to categories</div>
    <div class="flex justify-center">
        <div class="w-1/2 p-6">
            @error('category_id')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
            <form action="{{ route('subscribe.store') }}" method="POST">
                @csrf
                <div class="mb-3 flex justify-between">
                    <label for="category_id">Category</label>
                    <select multiple="true"  name="notification_id[]">
                        @foreach($categories as $category)
                            <option {{ in_array($category['id'], $notifications) ? 'selected' : '' }}  value="{{ $category['id'] }}">
                                {{ $category['name'] }}
                            </option >
                        @endforeach
                    </select>

                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="mb-3 text-center bg-green-500 p-3 w-full rounded-lg">Subscribe</button>
                </div>
            </form>
        </div>
    </div>
@endsection
