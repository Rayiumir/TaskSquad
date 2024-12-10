<?php

namespace App\Livewire\Support\Permissions;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadPermissions(): void
    {
        $this->readyToLoad = true;
    }

    public function deletePermissions($id): void
    {
        $permissions = Permission::find($id);
        $permissions->delete();
        $this->alert('success', 'دسترسی مورد نظر حذف شد!');
    }

    public function deletePermissionRole($id): void
    {
        $permissionRoles = DB::table('permission_role')->where('permission_id',$id);
        $permissionRoles->delete();
        $this->alert('success', 'دسترسی مورد نظر حذف شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $permissions = $this->readyToLoad ? Permission::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.permissions.index', compact('permissions'));
    }
}
