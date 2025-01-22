@props(['comment'])

<form method="POST" 
      action="{{ route('comments.update', $comment) }}" 
      class="mb-4">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <textarea name="content" 
                  rows="2" 
                  class="w-full px-3 py-2 border rounded" 
                  required>{{ $comment->content }}</textarea>
    </div>

    <div class="flex justify-end space-x-2">
        <button type="button" 
                onclick="toggleEdit({{ $comment->id }})" 
                class="text-gray-500 transition-all hover:text-gray-600">
            Cancel
        </button>
        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">
            Update
        </button>
    </div>
</form>
