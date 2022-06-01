@extends('index')

@section('content')
<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="flex justify-end pr-20 mt-10">
        <button id="addRow"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 hover:border-indigo-700">Add
            Class No.
        </button>
    </div>

    <form action="{{ Route('classStore') }}" method="POST">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <label for="lname" class="block text-sm font-medium text-gray-700"> Add Classroom(s) </label>
                        <div class="grid grid-cols-5 gap-5" id="rowParent">
                            <div class="col-span-2 mt-1 flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    Class No. 1 </span>
                                <input type="text" name="classNo[0]" id="lname"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Room No. 23">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end px-20 py-3 bg-gray-50">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>
</div>



<script>
    var i = 0;
    $("#addRow").click(function () {
        ++i;
        $("#rowParent").append('<div class="col-span-2 mt-1 flex rounded-md shadow-sm"><span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> Class No. '+(i+1)+'  </span> <input type="text" name="classNo['+i+']" id="lname" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Room No. 23"> </div>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection