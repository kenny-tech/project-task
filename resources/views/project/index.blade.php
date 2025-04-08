<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body>
        <a href="{{ url('/') }}" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] mx-6 my-6 dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
            Go back
        </a>
        <div>
            <a href="{{ url('/project/form') }}" class="inline-block dark:bg-[#0000ff] dark:border-[#eeeeec] dark:text-[#ffffff] mx-6 my-6 dark:hover:bg-gray dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                Create Project
            </a>
        </div>
        <table class="table-auto mx-6">
            @if(session('message')) 
                <p class="color: #00f">
                    Project created successfully
                </p>
            @endif
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($projects)
                    @foreach ( $projects as $row)
                    <tr>
                        <td scope="row">{{  $row->name }}</td>
                        <td> 
                            <a href="{{ url('/project/update/'.$row->id ) }}" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                Update
                            </a>
                            <a href="{{ url('project/delete/'.$row->id )}}" 
                                class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#ff0000] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal"
                                onclick="return confirm('Are you sure you want to delete this project?')" 
                                href="{{route('delete-project', $row->id)}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2"> No project found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>
