@extends('adminStaffPages.layouts.index')
@section('content')
    <div class="mt-20 lg:mt-0">
        <h2 class=" text-2xl font-semibold mb-4 text-center lg:text-start mt-2">Beranda</h2>
        <div class="grid grid-rows-4 lg:grid-cols-4 gap-4">
            <div class="relative flex w-full h-36 max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700">
                <div
                    class="relative w-3/5 m-0 overflow-hidden text-gray-700 bg-white rounded-r-none shrink-0 rounded-xl bg-clip-border">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1471&amp;q=80"
                        alt="image" class="object-cover w-full h-full" />
                </div>
                <div class="p-2">
                    <h6
                        class="block font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-pink-500 uppercase">
                        Rombel
                    </h6>
                    <p class="block font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                        22
                    </p>
                </div>
            </div>
            <div class="bg-white p-4 rounded-[10px] mx-3 lg:mx-0 h-36">
                <!-- Your content goes here -->
                Robmel
            </div>
            <div class="bg-white p-4 rounded-[10px] mx-3 lg:mx-0 h-36">
                <!-- Your content goes here -->
                Users
            </div>
            <div class="bg-white p-4 rounded-[10px] mx-3 lg:mx-0 h-36">
                <!-- Your content goes here -->
                Robmel
            </div>
        </div>
    </div>
@endsection
