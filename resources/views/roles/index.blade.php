<x-layouts.app :title="__('Roles')">
<div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                @endcan
            </div>
        </div>
    </div>
    
    @session('success')
        <div class="alert alert-success" role="alert"> 
            {{ $value }}
        </div>
    @endsession
    
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider w-24">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider w-72">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr class=" hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ++$i }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $role->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('roles.show',$role->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 text-sm font-medium rounded-md hover:bg-blue-50 transition-colors">
                                <i class="fa-solid fa-list mr-1"></i> Show
                            </a>
                            @can('role-edit')
                                <a href="{{ route('roles.edit',$role->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-600 text-sm font-medium rounded-md hover:bg-green-50 transition-colors">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                </a>
                            @endcan
                            
                            @can('role-delete')
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 border border-red-500 text-red-600 text-sm font-medium rounded-md hover:bg-red-50 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                    <i class="fa-solid fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {!! $roles->links('pagination::bootstrap-5') !!}
</div>
</x-layouts.app>