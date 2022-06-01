@extends('index')

@section('content')
<div class="h-[calc(100vh_-_5rem)] bg-slate-50 overflow-auto">
    <div class="sm:flex items-center justify-end mt-10 mr-5">
        <a href="{{ Route('classAdd') }}"
            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-sm font-medium leading-none text-white">
            Add Classroom
        </a>
    </div>
    <div class="grid grid-cols-6 gap-5 mt-5">
        @foreach ($classes as $item)

        <div
            class="col-span-2 mt-1 flex justify-items-center  shadow-sm focus:outline-none h-16 border border-gray-200 rounded">
            <div
                class="flex items-center justify-self-center pl-5 text-base font-medium leading-none text-gray-700  mr-2">
                {{$item->classNo }} </div>

        </div>

        @endforeach
    </div>
</div>
@endsection