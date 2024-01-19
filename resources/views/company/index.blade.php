<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->has('logo'))
                        <div class="alert alert-danger">
                            {{ $errors->first('logo') }}
                        </div>
                    @endif

                    <table id="companiesTable" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td> 
                                        <a href="{{ $company->website }}" target="_blank" style="color: blue; text-decoration: underline;">
                                            {{ $company->website }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($company->logo)
                                            <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" width="100" height="100">
                                        @else
                                            <span>No Logo Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500">
                                            <x-primary-button>Edit</x-primary-button>
                                        </a>
                                        <x-danger-button>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="confirm_delete" value="1"> 

                                                <input type="submit" class="text-white" value="Delete" />
                                            </form>
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
