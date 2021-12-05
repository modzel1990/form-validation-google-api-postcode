@extends('layouts.default')

@section('content')

    @include('partials.messages')

    <div class="bg-white overflow-hidden shadow rounded-lg">

        <div class="px-4 py-4 sm:p-8">

            <div class="mb-4 pb-4 border-b">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Data Capture</h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam consectetur delectus ducimus, et excepturi illum in labore, laborum libero modi quis repudiandae soluta sunt temporibus voluptas voluptates.</p>
            </div>

            <form class="w-full" action="{{ route('post::data-capture.store') }}" method="POST">
                @csrf
                <div class="sm:grid sm:grid-cols-2 sm:gap-4 mb-4">
                    <div class="mb-4 sm:mb-0">
                        <label class="block text-sm font-medium leading-5 text-gray-700 mb-2" for="form_first_name">First Name</label>
                        <input name="first_name" id="form_first_name" type="text" value="{{ old('first_name') }}" placeholder="Joe" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('first_name') border-red-500 @enderror">

                        @error('first_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium leading-5 text-gray-700 mb-2" for="form_last_name">Last Name</label>
                        <input name="last_name" id="form_last_name" type="text" value="{{ old('last_name') }}" placeholder="Bloggs" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('last_name') border-red-500 @enderror">

                        @error('last_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium leading-5 text-gray-700 mb-2" for="form_postal_code">Post Code</label>
                    <input name="postal_code" id="form_postal_code" type="text" value="{{ old('postal_code') }}" placeholder="I.E. LS12 2DS" class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('postal_code') border-red-500 @enderror">

                    @error('postal_code')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-700 transition ease-in-out duration-150">Submit</button>
            </form>

            @error('success')
            <p class="mt-2 text-sm text-green-600">{{ $message }}</p>
            @enderror

        </div>

    </div>

@endsection
