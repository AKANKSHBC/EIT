@extends('index')

@section('content')

<div class="h-[calc(100vh_-_5rem)] bg-slate-100 overflow-auto">
    {{-- <div class="w-4/5 mx-auto flex justify-end mt-3">
        <a href="{{ Route('addLecturer')}}" class="p-2 border-2">Add Lecturer</a>
    </div> --}}

    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                    class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 ">
                    Lecturers</p>
            </div>
        </div>
        <div class="bg-white  py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <x-anchorg :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('All') }}
                    </x-anchorg>
                    <x-anchorg :href="route('gradeA')" :active="request()->routeIs('gradeA')">
                        {{ __('Grade A') }}
                    </x-anchorg>
                    <x-anchorg :href="route('gradeB')" :active="request()->routeIs('gradeB')">
                        {{ __('Grade B') }}
                    </x-anchorg>

                    {{-- <a
                        class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                        href="{{ Route('gradeB') }}">
                        Grade B
                    </a> --}}
                </div>
                <div class="flex">
                    <a href="{{Route('addLecturer')}}"
                        class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-sm font-medium leading-none text-white">
                        Add Lecturer
                    </a>


                    <button
                        class="ml-5 focus:ring-2 focus:ring-offset-2 focus:ring-red-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none rounded text-sm font-medium leading-none text-white"
                        type="button" data-modal-toggle="authentication-modal">
                        Delete Lecturer
                    </button>

                    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-zinc-500 bg-opacity-50">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="authentication-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div class="py-6 px-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Remove a Lecturer
                                        by entering their Name </h3>
                                    <form class="space-y-6" action="{{Route('deleteLecturer')}}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name
                                            </label>
                                            <input type="text" name="dname" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>
                        @foreach ($lecturers as $item)

                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100  rounded">
                            <td>
                                <div class="ml-5">
                                    <div
                                        class="bg-gray-200  rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
                                        <input placeholder="checkbox" type="checkbox"
                                            class="focus:opacity-100 checkbox opacity-0 absolute cursor-pointer w-full h-full" />
                                        <div class="check-icon hidden bg-indigo-700 text-white rounded-sm">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg7.svg"
                                                alt="check-icon">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700  mr-2">{{$item->name}}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg2.svg" alt="tag">
                                    <p class="text-sm leading-none text-gray-600  ml-2">{{$item->grade}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg3.svg" alt="list">
                                    <p class="text-sm leading-none text-gray-600  ml-2">{{$item->joined_on}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg4.svg" alt="chat">
                                    <p class="text-sm leading-none text-gray-600   ml-2">23</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg5.svg"
                                        alt="paper clip">
                                    <p class="text-sm leading-none text-gray-600   ml-2">04/07</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <button
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">Due
                                    today at 18:00</button>
                            </td>
                            <td class="pl-4">
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600   py-3 px-5 bg-gray-100 rounded hover:bg-gray-200      focus:outline-none">View</button>
                            </td>
                            <td>
                                <div class="relative px-5 pt-2">
                                    <button class="focus:ring-2 rounded-md focus:outline-none"
                                        onclick="dropdownFunction(this)" role="button" aria-label="option">
                                        <img class="dropbtn" onclick="dropdownFunction(this)"
                                            src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg6.svg"
                                            alt="dropdown">
                                    </button>
                                    <div
                                        class="dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 hidden">
                                        <div tabindex="0"
                                            class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                            <p>Edit</p>
                                        </div>
                                        <div tabindex="0"
                                            class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                            <p>Delete</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="h-3"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <style>
        .checkbox:checked+.check-icon {
            display: flex;
        }
    </style> --}}






</div>

@endsection