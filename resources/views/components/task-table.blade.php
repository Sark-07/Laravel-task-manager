@props(['tasks', 'users'])
<table class="w-full caption-bottom text-sm">
    @if (count($tasks) > 0)
    <thead class="[&amp;_tr]:border-b">
       <x-table-head-row/>
    </thead>
    <tbody class="[&amp;_tr:last-child]:border-0">
        <x-row :tasks="$tasks" :users="isset($users) ? $users : null"/>         
    </tbody>
    @else
        <h1 class="text-3xl w-full font-bold text-gray-800 text-center py-8">No Task Found!</h1>
    @endif
</table>
