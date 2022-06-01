@extends('index')

@section('content')
<div class="h-[calc(100vh_-_5rem)] bg-slate-50 overflow-auto">
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0"
                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800 ">
                Exam Details</p>
        </div>
    </div>
    <div class="bg-white  py-4 md:py-7 px-4 md:px-8 xl:px-10">
        <div class="mt-7 overflow-x-auto">
            <table class="w-full whitespace-nowrap border-2 border-slate-100 shadow p-3">
                <thead class="border-b-2">
                    <tr class="focus:outline-none h-16 border border-gray-100 rounded">
                        <th></th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Sessions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; ?>
                    @foreach ($datesWithoutSundays as $item)

                    <?php $i++; ?>
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
                                <p class="text-base font-medium leading-none text-gray-700  mr-2">Day
                                    <?php echo $i; ?>
                                </p>
                            </div>
                        </td>
                        <td class="border-r-2">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600  ml-2">{{$item->format('l \\, jS F Y')}}
                                </p>
                            </div>
                        </td>
                        <td>
                            <?php $k=0; ?>
                            <div class="flex justify-around">
                                <div class="flex" id="sessionOriginal<?php echo $i; ?>">
                                    @for ($j = 0; $j < $exam->sessionNo; $j++)
                                        <?php $k++; ?>
                                        <div id="sessionAddition<?php echo $i.'.'.$k; ?>">
                                            <button type="button"
                                                class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-700 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out "
                                                data-modal-toggle="defaultModal<?php echo $i.'.'.$k; ?>">Session
                                                <?php echo $i.'.'.$k; ?>
                                            </button>
                                            <div id="defaultModal<?php echo $i.'.'.$k; ?>" tabindex="-1"
                                                aria-hidden="true"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-zinc-500 bg-opacity-50 transition duration-150 ease-in-out">
                                                <div class="relative p-4 w-full max-w-2xl max-h-[calc(90vh)]">

                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                                        <div
                                                            class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Session
                                                                <?php echo $i.".".$k; ?>
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-toggle="defaultModal<?php echo $i.'.'.$k; ?>">
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div
                                                            class="p-6 space-y-6 h-auto max-h-[calc(65vh)]  overflow-auto">
                                                            <p>Select the Classrooms available</p>
                                                            <div class="grid grid-cols-6 gap-5 mt-2">
                                                                @foreach ($classRooms as $classRoom)
                                                                <div
                                                                    class="col-span-2 mt-1 flex justify-items-center  shadow-sm focus:outline-none h-16 border border-gray-200 rounded">
                                                                    <div
                                                                        class="flex items-center justify-self-center pl-5 text-base font-medium leading-none text-gray-700  mr-2">
                                                                        {{$classRoom->classNo}}</div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                            <button
                                                                data-modal-toggle="defaultModal<?php echo $i.'.'.$k; ?>"
                                                                type="button"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                                accept</button>
                                                            <button
                                                                data-modal-toggle="defaultModal<?php echo $i.'.'.$k; ?>"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button id="<?php echo $i; ?>" onclick="addBtn(this)"
                                        class="p-2 bg-blue-50 border-2 rounded-lg border-slate-200 flex items-center justify-center text-blue-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Add Session
                                    </button>
                                    <button onclick="removeBtn(this)" id="removeSession[<?php echo $i; ?>]"
                                        class="p-2 bg-red-50 border-2 rounded-lg border-slate-200 flex items-center justify-center text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Remove Session
                                    </button>
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

<script>
    function removeBtn(id) {
        console.log(id);
    }
    function addBtn(di) {
        console.log(di);
        var att = di.id.toString();    
        console.log(att);
        var sessionOriginal = document.getElementById("sessionOriginal"+att);
        var sessionOriginalCount = document.getElementById("sessionOriginal"+att).childElementCount;
        console.log(sessionOriginal);
        console.log("count",sessionOriginalCount);
        var support = (function () {
	        if (!window.DOMParser) return false;
	        var parser = new DOMParser();
	        try {
		        parser.parseFromString('x', 'text/html');
	        } catch(err) {
		        return false;
	        }
	        return true;
        })();

        var textToHTML= function (str) {

        // check for DOMParser support
	    if (support) {
		    var parser = new DOMParser();
		    var doc = parser.parseFromString(str, 'text/html');
		    return doc.body.innerHTML;
	    }

	    // Otherwise, create div and append HTML
	    dom.innerHTML = str;
	    return dom; 
        };

        var sess = textToHTML('<div id="sessionAddition<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>"> <button type="button" class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-700 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out " data-modal-toggle="defaultModal<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>">Session <?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?> </button> <div id="defaultModal<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-slate-50 bg-opacity-70 transition duration-150 ease-in-out"> <div class="relative p-4 w-full max-w-2xl max-h-[calc(90vh)]"> <div class="relative bg-white rounded-lg shadow dark:bg-gray-700"> <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600"> <h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Session <?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?></h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>"> <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button> </div> <div class="p-6 space-y-6 h-auto max-h-[calc(65vh)]  overflow-auto"> <p>Select the Classrooms available</p><div class="grid grid-cols-6 gap-5 mt-2">@foreach ($classRooms as $classRoom) <div class="col-span-2 mt-1 flex justify-items-center  shadow-sm focus:outline-none h-16 border border-gray-200 rounded"> <div class="flex items-center justify-self-center pl-5 text-base font-medium leading-none text-gray-700  mr-2"> {{$classRoom->classNo}}</div></div>@endforeach </div></div><div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600"><button data-modal-toggle="defaultModal<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> <button data-modal-toggle="defaultModal<?php echo "'+att+'.'+(sessionOriginalCount+1)+'"; ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button></div></div></div></div></div>');

        function createMenuItem(name) {
            let div = document.createElement('div');
            div.innerHTML = sess;
            return div;
        }
        sessionOriginal.appendChild(createMenuItem('Home'));
        
        // sessionOriginal.append('<div id="sessionAddition<?php echo $i.".".$k; ?>"> <button type="button" class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-700 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out " data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>">Session <?php echo $i.".".$k; ?> </button> <div id="defaultModal<?php echo $i.".".$k; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-slate-50 bg-opacity-70 transition duration-150 ease-in-out"> <div class="relative p-4 w-full max-w-2xl max-h-[calc(90vh)]"> <div class="relative bg-white rounded-lg shadow dark:bg-gray-700"> <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600"> <h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Session <?php echo $i.".".$k; ?></h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>"> <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button> </div> <div class="p-6 space-y-6 h-auto max-h-[calc(65vh)]  overflow-auto"> <p>Select the Classrooms available</p><div class="grid grid-cols-6 gap-5 mt-2">@foreach ($classRooms as $classRoom) <div class="col-span-2 mt-1 flex justify-items-center  shadow-sm focus:outline-none h-16 border border-gray-200 rounded"> <div class="flex items-center justify-self-center pl-5 text-base font-medium leading-none text-gray-700  mr-2"> {{$classRoom->classNo}}</div></div>@endforeach </div></div><div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600"><button data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> <button data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button></div></div></div></div></div>');

    }
</script>
<script>
    // var i = 0;
    // $("#addBtn").click(function (id) {
    //     ++i;
    //     console.log(id);
    //     $("#rowParent").append('<div id="sessionAddition<?php echo $i.".".$k; ?>"> <button type="button" class="inline-block px-6 py-2 border-2 border-blue-400 text-blue-700 font-medium text-xs leading-tight uppercase rounded-full hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out " data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>">Session <?php echo $i.".".$k; ?> </button> <div id="defaultModal<?php echo $i.".".$k; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center bg-slate-50 bg-opacity-70 transition duration-150 ease-in-out"> <div class="relative p-4 w-full max-w-2xl max-h-[calc(90vh)]"> <div class="relative bg-white rounded-lg shadow dark:bg-gray-700"> <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600"> <h3 class="text-xl font-semibold text-gray-900 dark:text-white"> Session <?php echo $i.".".$k; ?></h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>"> <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button> </div> <div class="p-6 space-y-6 h-auto max-h-[calc(65vh)]  overflow-auto"> <p>Select the Classrooms available</p><div class="grid grid-cols-6 gap-5 mt-2">@foreach ($classRooms as $classRoom) <div class="col-span-2 mt-1 flex justify-items-center  shadow-sm focus:outline-none h-16 border border-gray-200 rounded"> <div class="flex items-center justify-self-center pl-5 text-base font-medium leading-none text-gray-700  mr-2"> {{$classRoom->classNo}}</div></div>@endforeach </div></div><div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600"><button data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button> <button data-modal-toggle="defaultModal<?php echo $i.".".$k; ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button></div></div></div></div></div>');
    // });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>

@endsection