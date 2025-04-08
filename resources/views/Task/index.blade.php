<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body>
        <a href="{{ url('/task/form') }}" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
            Create Task
        </a>
        <table class="table">
            @if(session('message')) 
                <p class="color: #00f">
                    Task created successfully
                </p>
            @endif
            <table class="table-auto">
                <thead>
                <tr class="w-full">
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if($tasks)
                        @foreach ( $tasks as $row)
                        <tr>
                            <td scope="row">{{  $row->title }}</td>
                            <td scope="row">{{  $row->description }}</td>
                            <td> 
                                <a href="{{ url('/task/update/'.$row->id ) }}" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                    Update
                                </a>
                                <a href="{{ url('task/delete/'.$row->id )}}" 
                                    class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#ff0000] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal"
                                    onclick="return confirm('Are you sure you want to delete this task?')" 
                                    href="{{route('delete-task', $row->id)}}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2"> No Task found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
    </body>
</html>
