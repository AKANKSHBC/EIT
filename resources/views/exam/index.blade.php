@extends('index')

@section('content')
    <div class="bg-white mt-4 py-4 md:py-7 px-4 md:px-8 xl:px-10">
        <div class="sm:flex items-center justify-end">
            <a href="{{ Route('addExam')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-sm font-medium leading-none text-white">
                Add Exam
            </a>
        </div>
        <div class="mt-7 overflow-x-auto">
            @if (count($exams) > 0) 
                <table class="w-full whitespace-nowrap border-2">
                    <thead>
                        <tr class="focus:outline-none h-16 border border-gray-100 rounded">
                            <th>Exam</th>
                            <th>Semester</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>No. of Sessions</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $item)
                        
                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                            <td class="pl-3">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700  mr-2">{{$item->examName}}</p>
                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">
                                
                                    <p class="text-sm leading-none text-gray-600  ml-2">{{$item->semester}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                
                                    <p class="text-sm leading-none text-gray-600  ml-2">{{$item->startDate}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    
                                    <p class="text-sm leading-none text-gray-600   ml-2">{{$item->endDate}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                
                                    <p class="text-sm leading-none text-gray-600   ml-2">{{$item->sessionNo}}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <button class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">Due today at 18:00</button>
                            </td>
                            <td class="pl-4">
                                <a href="{{Route('viewExam', ['exam' => $item->id]) }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600   py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">View</a>
                            </td>
                            
                        </tr>
                        <tr class="h-3"></tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                no exams Yet!
            @endif
        </div>
    </div>
@endsection