<x-layouts.app :title="__('Users')">
<div>
    <div class="">
        <div class="">
            <div class="">
                <h2>Users Management</h2>
            </div>
            <div class="">
                <a class="mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
            </div>
            {{-- @can('user-create')
                <a class="btn btn-success btn-sm mb-2" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                @endcan --}}
        </div>
    </div>
    
    @session('success')
        <div class="" role="alert"> 
            {{ $value }}
        </div>
    @endsession
    
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Roles</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider w-72">Action</th>
                </tr>
            </thead>
            <tbody class=" divide-y divide-gray-200">
                @foreach ($data as $key => $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ++$i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        @if(!empty($user->getRoleNames()))
                            <div class="flex flex-wrap gap-1">
                                @foreach($user->getRoleNames() as $v)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $v }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('users.show',$user->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
                                <i class="fa-solid fa-list mr-1"></i> Show
                            </a>
                            <a href="{{ route('users.edit',$user->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors">
                                <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fa-solid fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-layouts.app>