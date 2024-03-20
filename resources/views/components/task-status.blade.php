@props(['task'])
<select
class="flex appearance-none h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-gray-400 focus-visible:ring-1 disabled:cursor-not-allowed disabled:opacity-50"
name="status">
@foreach (['pending', 'progress', 'completed'] as $item)       
<option {{old('status', (isset($task) ? $task->status : '')) === $item ? 'selected' : ''}} class="bg-white text-black" value="{{$item}}">{{ucwords($item)}}</option>
@endforeach
</select>