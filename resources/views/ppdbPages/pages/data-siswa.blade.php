@extends('ppdbPages.layouts.index')
@section('content')
    <section>
        <div class="container w-[95%] m-auto my-[1.2rem] flex gap-5 flex-wrap items-center mt-4 p-4 bg-white ">
            <div class="py-8 m-auto w-full">
                <div>
                    <livewire:search-student />
                    @livewireScripts
                </div>
            </div>
        </div>
    </section>
@endsection
